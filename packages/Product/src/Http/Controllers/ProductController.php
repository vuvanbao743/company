<?php

namespace Product\Http\Controllers;

use App\Models\Setting;
use Product\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    public function showProduct()
    {
        $title = "Quản lý sản phẩm";
        $products = Product::all();
        return view('admin::products.index', compact('products', 'title'));
    }

    public function createProduct()
    {
        $title = "Thêm sản phẩm";
        return view('admin::products.create', compact('title'));
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        }

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'image'       => $imageUrl,
        ]);

        return redirect()->route('admins.product')->with('success', 'Tạo sản phẩm thành công!');
    }

    public function showDetailProduct(string $id)
    {
        $title = "Thông tin chi tiết sản phẩm";
        $product = Product::find($id);
        return view('admin::products.show', compact('product', 'title'));
    }

    public function showEditProduct(string $id)
    {
        $title = "Sửa sản phẩm";
        $product = Product::find($id);
        return view('admin::products.edit', compact('product', 'title'));
    }

    public function updateProduct(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admins.product')->with('error', 'Sản phẩm không tồn tại!');
        }

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $updateData = [
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
        ];

        if ($request->hasFile('image')) {
            $imageUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $updateData['image'] = $imageUrl;
        }

        $product->update($updateData);

        return redirect()->route('admins.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admins.product')->with('error', 'Sản phẩm không tồn tại!');
        }
        $product->delete();
        return redirect()->route('admins.product')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function homepage()
    {
        $adminPackageEnabled = Setting::get('admin_package_enabled', false);
        $products = Product::latest()->take(5)->get();
        $view = $adminPackageEnabled ? 'client.template1.index' : 'client.template2.index';
        return view($view, compact('products'));
    }
}
