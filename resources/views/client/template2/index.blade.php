@extends('client.template2.master')

@section('content')
    <section id="intro" class="position-relative mt-4">
        <div class="container-lg">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
                            <img src="{{ asset('assets/template2/images/card-image1.jpg') }}" alt="shoes"
                                class="img-fluid jarallax-img">
                            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                <h2 class="card-title display-3 light">Stylish shoes for Women</h2>
                                <a href="index.html"
                                    class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="row g-4">
                            <div class="col-lg-12 mb-4">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="{{ asset('assets/template2/images/card-image2.jpg') }}" alt="shoes"
                                        class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Sports Wear</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="{{ asset('assets/template2/images/card-image3.jpg') }}" alt="shoes"
                                        class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="row g-4">
                            <div class="col-lg-12 mb-4">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="{{ asset('assets/template2/images/card-image5.jpg') }}" alt="shoes"
                                        class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Men Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="{{ asset('assets/template2/images/card-image6.jpg') }}" alt="shoes"
                                        class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Women Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
        <div class="container">
            <div class="bg-gray coupon position-relative p-5">
                <div class="bold-text position-absolute">10% OFF</div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7 col-md-12 mb-3">
                        <div class="coupon-header">
                            <h2 class="display-7">10% OFF Discount Coupons</h2>
                            <p class="m-0">Subscribe us to get 10% OFF on all the purchases</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email
                                me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured-products" class="product-store">
        <div class="container-md">
            <div class="display-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase">Featured Products</h2>
                <div class="btn-right">
                    <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
                </div>
            </div>
            <div class="product-content padding-small">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                    @foreach ($products as $product)
                        <div class="col mb-4">
                            <div class="product-card position-relative">
                                <div class="card-img">
                                    {{-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image img-fluid"> --}}
                                    {{-- <img src="{{ route('product.image', ['filename' => basename($product->image)]) }}" alt="product image" width="100"> --}}
                                    <div class="cart-concern position-absolute d-flex justify-content-center">
                                        <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                                data-bs-target="#modallong">
                                                <svg class="shopping-carriage">
                                                    <use xlink:href="#shopping-carriage"></use>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                                data-bs-toggle="modal">
                                                <svg class="quick-view">
                                                    <use xlink:href="#quick-view"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                    <h3 class="card-title fs-6 fw-normal m-0">
                                        <a href="#">{{ $product->name }}</a>
                                    </h3>
                                    <span class="card-price fw-bold">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <section id="collection-products" class="py-2 my-2 py-md-5 my-md-5">
        <div class="container-md">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="collection-card card border-0 d-flex flex-row align-items-end jarallax-keep-img">
                        <img src="{{ asset('assets/template2/images/collection-item1.jpg') }}" alt="product-item"
                            class="border-rounded-10 img-fluid jarallax-img">
                        <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
                            <h3 class="card-title display-3">
                                <a href="#">Minimal Collection</a>
                            </h3>
                            <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="collection-card card border-0 d-flex flex-row jarallax-keep-img">
                        <img src="{{ asset('assets/template2/images/collection-item2.jpg') }}" alt="product-item"
                            class="border-rounded-10 img-fluid jarallax-img">
                        <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
                            <h3 class="card-title display-3">
                                <a href="#">Sneakers Collection</a>
                            </h3>
                            <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="latest-products" class="product-store py-2 my-2 py-md-5 my-md-5 pt-0">
        <div class="container-md">
            <div class="display-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase">Latest Products</h2>
                <div class="btn-right">
                    <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
                </div>
            </div>
            <div class="product-content padding-small">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                    <div class="col mb-4 mb-3">
                        <div class="product-card position-relative">
                            <div class="card-img">
                                <img src="{{ asset('assets/template2/images/card-item6.jpg') }}" alt="product-item"
                                    class="product-image img-fluid">
                                <div class="cart-concern position-absolute d-flex justify-content-center">
                                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modallong">
                                            <svg class="shopping-carriage">
                                                <use xlink:href="#shopping-carriage"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                            data-bs-toggle="modal">
                                            <svg class="quick-view">
                                                <use xlink:href="#quick-view"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- cart-concern -->
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                <h3 class="card-title fs-6 fw-normal m-0">
                                    <a href="index.html">Running shoes for men</a>
                                </h3>
                                <span class="card-price fw-bold">$99</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 mb-3">
                        <div class="product-card position-relative">
                            <div class="card-img">
                                <img src="{{ asset('assets/template2/images/card-item7.jpg') }}" alt="product-item"
                                    class="product-image img-fluid">
                                <div class="cart-concern position-absolute d-flex justify-content-center">
                                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modallong">
                                            <svg class="shopping-carriage">
                                                <use xlink:href="#shopping-carriage"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                            data-bs-toggle="modal">
                                            <svg class="quick-view">
                                                <use xlink:href="#quick-view"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- cart-concern -->
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                <h3 class="card-title fs-6 fw-normal m-0">
                                    <a href="index.html">Running shoes for men</a>
                                </h3>
                                <span class="card-price fw-bold">$99</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 mb-3">
                        <div class="product-card position-relative">
                            <div class="card-img">
                                <img src="{{ asset('assets/template2/images/card-item8.jpg') }}" alt="product-item"
                                    class="product-image img-fluid">
                                <div class="cart-concern position-absolute d-flex justify-content-center">
                                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modallong">
                                            <svg class="shopping-carriage">
                                                <use xlink:href="#shopping-carriage"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                            data-bs-toggle="modal">
                                            <svg class="quick-view">
                                                <use xlink:href="#quick-view"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- cart-concern -->
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                <h3 class="card-title fs-6 fw-normal m-0">
                                    <a href="index.html">Running shoes for men</a>
                                </h3>
                                <span class="card-price fw-bold">$99</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 mb-3">
                        <div class="product-card position-relative">
                            <div class="card-img">
                                <img src="{{ asset('assets/template2/images/card-item9.jpg') }}" alt="product-item"
                                    class="product-image img-fluid">
                                <div class="cart-concern position-absolute d-flex justify-content-center">
                                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modallong">
                                            <svg class="shopping-carriage">
                                                <use xlink:href="#shopping-carriage"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                            data-bs-toggle="modal">
                                            <svg class="quick-view">
                                                <use xlink:href="#quick-view"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- cart-concern -->
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                <h3 class="card-title fs-6 fw-normal m-0">
                                    <a href="index.html">Running shoes for men</a>
                                </h3>
                                <span class="card-price fw-bold">$99</span>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 mb-3">
                        <div class="product-card position-relative">
                            <div class="card-img">
                                <img src="{{ asset('assets/template2/images/card-item10.jpg') }}" alt="product-item"
                                    class="product-image img-fluid">
                                <div class="cart-concern position-absolute d-flex justify-content-center">
                                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                            data-bs-target="#modallong">
                                            <svg class="shopping-carriage">
                                                <use xlink:href="#shopping-carriage"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" data-bs-target="#modaltoggle"
                                            data-bs-toggle="modal">
                                            <svg class="quick-view">
                                                <use xlink:href="#quick-view"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- cart-concern -->
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                <h3 class="card-title fs-6 fw-normal m-0">
                                    <a href="index.html">Running shoes for men</a>
                                </h3>
                                <span class="card-price fw-bold">$99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
