@extends('website.layouts.electronics')
@section('title', 'Homepage')
@section('content')
<!-- Premium Hero Section -->
<section class="hero-gradient pt-6 pb-12 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Categories Sidebar Placeholder (Desktop) -->
            <div class="hidden lg:block w-[260px] flex-shrink-0"></div>

            <!-- Main Hero Slider -->
            <div class="flex-1 w-full relative group rounded-2xl overflow-hidden shadow-2xl bg-white" data-aos="fade-up"
                data-aos-duration="1000">
                <!-- Swiper -->
                <div class="swiper heroSwiper h-[400px] md:h-[500px]">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide relative">
                            <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&w=2000&q=80"
                                alt="Sale" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/50 to-transparent">
                            </div>
                            <div class="absolute inset-0 flex items-center">
                                <div class="px-8 md:px-16 w-full max-w-2xl">
                                    <span
                                        class="inline-block bg-brand-500/20 text-brand-400 border border-brand-500/30 backdrop-blur-sm text-sm font-bold px-4 py-1.5 rounded-full mb-6 transform translate-y-4 opacity-0 transition-all duration-700 delay-100 slide-element uppercase tracking-widest">Weekend
                                        Mega Sale</span>
                                    <h1
                                        class="text-4xl md:text-6xl font-heading font-extrabold text-white leading-tight mb-6 transform translate-y-4 opacity-0 transition-all duration-700 delay-300 slide-element">
                                        Next-Gen Tech <br><span class="text-gradient">Devices</span> 2026
                                    </h1>
                                    <p
                                        class="text-lg text-gray-300 mb-8 max-w-md transform translate-y-4 opacity-0 transition-all duration-700 delay-500 slide-element">
                                        Upgrade your lifestyle with our premium collection of smartphones, smartwatches,
                                        and accessories.</p>
                                    <div
                                        class="transform translate-y-4 opacity-0 transition-all duration-700 delay-700 slide-element">
                                        <a href="category.html"
                                            class="inline-flex items-center gap-3 bg-white text-gray-900 hover:bg-brand-600 hover:text-white font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-[0_10px_20px_rgba(255,255,255,0.2)] hover:shadow-[0_10px_20px_rgba(13,148,136,0.3)]">
                                            Shop Now <i class="ph-bold ph-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide relative">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=2000&q=80"
                                alt="Fashion" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/40 to-transparent">
                            </div>
                            <div class="absolute inset-0 flex items-center">
                                <div class="px-8 md:px-16 w-full max-w-2xl">
                                    <span
                                        class="inline-block bg-accent-500/20 text-accent-400 border border-accent-500/30 backdrop-blur-sm text-sm font-bold px-4 py-1.5 rounded-full mb-6 transform translate-y-4 opacity-0 transition-all duration-700 delay-100 slide-element uppercase tracking-widest">Spring
                                        Collection</span>
                                    <h1
                                        class="text-4xl md:text-6xl font-heading font-extrabold text-white leading-tight mb-6 transform translate-y-4 opacity-0 transition-all duration-700 delay-300 slide-element">
                                        Exclusive Fashion <br><span class="text-accent-500">Trends</span>
                                    </h1>
                                    <p
                                        class="text-lg text-gray-300 mb-8 max-w-md transform translate-y-4 opacity-0 transition-all duration-700 delay-500 slide-element">
                                        Discover the most trending clothes of the season. Flat 50% off on your first
                                        order.</p>
                                    <div
                                        class="transform translate-y-4 opacity-0 transition-all duration-700 delay-700 slide-element">
                                        <a href="category.html"
                                            class="inline-flex items-center gap-3 bg-accent-500 text-white hover:bg-accent-600 font-bold px-8 py-4 rounded-full transition-all duration-300 shadow-[0_10px_20px_rgba(245,158,11,0.3)]">
                                            Explore Collection <i class="ph-bold ph-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Swiper Pagination & Navigation -->
                    <div class="swiper-pagination mb-2"></div>
                    <div
                        class="swiper-button-next !text-white !bg-black/20 hover:!bg-brand-600 backdrop-blur-md !w-12 !h-12 !rounded-full !opacity-0 group-hover:!opacity-100 transition-all duration-300 !right-4 after:!text-lg shadow-lg">
                    </div>
                    <div
                        class="swiper-button-prev !text-white !bg-black/20 hover:!bg-brand-600 backdrop-blur-md !w-12 !h-12 !rounded-full !opacity-0 group-hover:!opacity-100 transition-all duration-300 !left-4 after:!text-lg shadow-lg">
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute bottom-10 right-10 z-10 glass-panel rounded-xl p-4 hidden md:flex items-center gap-4 shadow-2xl animate-bounce"
                        style="animation-duration: 3s;">
                        <div
                            class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-brand-600 shadow-inner">
                            <i class="ph-fill ph-tag text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Save up to</p>
                            <p class="text-2xl font-heading font-extrabold text-gray-900">40% OFF</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Features -->
<section class="container mx-auto px-4 -mt-8 relative z-20 mb-16">
    <div class="bg-white rounded-2xl shadow-soft p-6 lg:p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-0 lg:divide-x divide-gray-100 border border-gray-100"
        data-aos="fade-up" data-aos-delay="200">
        <div class="flex items-center gap-5 px-4 group hover:-translate-y-1 transition-transform duration-300">
            <div
                class="w-14 h-14 rounded-full bg-brand-50 flex items-center justify-center text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors duration-300 flex-shrink-0">
                <i class="ph ph-truck text-3xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 font-heading">Free Shipping</h4>
                <p class="text-sm text-gray-500 mt-1">Orders over $99</p>
            </div>
        </div>
        <div class="flex items-center gap-5 px-4 group hover:-translate-y-1 transition-transform duration-300">
            <div
                class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300 flex-shrink-0">
                <i class="ph ph-shield-check text-3xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 font-heading">Secure Payment</h4>
                <p class="text-sm text-gray-500 mt-1">100% safe checkout</p>
            </div>
        </div>
        <div class="flex items-center gap-5 px-4 group hover:-translate-y-1 transition-transform duration-300">
            <div
                class="w-14 h-14 rounded-full bg-accent-50 flex items-center justify-center text-accent-500 group-hover:bg-accent-500 group-hover:text-white transition-colors duration-300 flex-shrink-0">
                <i class="ph ph-arrow-u-up-left text-3xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 font-heading">30 Days Return</h4>
                <p class="text-sm text-gray-500 mt-1">Easy returns policy</p>
            </div>
        </div>
        <div class="flex items-center gap-5 px-4 group hover:-translate-y-1 transition-transform duration-300">
            <div
                class="w-14 h-14 rounded-full bg-rose-50 flex items-center justify-center text-rose-500 group-hover:bg-rose-500 group-hover:text-white transition-colors duration-300 flex-shrink-0">
                <i class="ph ph-headset text-3xl"></i>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 font-heading">24/7 Support</h4>
                <p class="text-sm text-gray-500 mt-1">Dedicated help center</p>
            </div>
        </div>
    </div>
</section>

<!-- Top Categories (Masonry Style / Grid) -->
<section class="container mx-auto px-4 mb-20">
    <div class="flex items-end justify-between mb-8" data-aos="fade-up">
        <div>
            <span class="text-brand-600 font-bold tracking-wider uppercase text-xs">Discover</span>
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 mt-2">Popular Categories</h2>
        </div>
        <a href="category.html"
            class="hidden sm:inline-flex items-center gap-2 font-bold text-brand-600 hover:text-brand-800 transition">View
            All <i class="ph-bold ph-arrow-right"></i></a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        <!-- Large category -->
        <div class="col-span-2 row-span-2 relative rounded-2xl overflow-hidden group cursor-pointer h-64 md:h-[420px]"
            data-aos="fade-up" data-aos-delay="100">
            <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?auto=format&fit=crop&w=800&q=80"
                alt="Laptops"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-6 left-6 right-6">
                <span
                    class="bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full mb-3 inline-block">TECH</span>
                <h3 class="text-white font-heading font-bold text-2xl md:text-3xl mb-2">Premium Laptops</h3>
                <a href="category.html"
                    class="text-white/80 hover:text-white font-medium flex items-center gap-2 transition group-hover:translate-x-2">Shop
                    Now <i class="ph ph-arrow-right"></i></a>
            </div>
        </div>

        <!-- Small Category -->
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer h-48 md:h-[200px]" data-aos="fade-up"
            data-aos-delay="200">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80"
                alt="Shoes"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-4 left-5">
                <h3 class="text-white font-heading font-bold text-lg md:text-xl mb-1">Sneakers</h3>
                <a href="category.html"
                    class="text-white/80 hover:text-white text-sm font-medium flex items-center gap-1 transition group-hover:translate-x-1">Shop
                    Now <i class="ph ph-arrow-right"></i></a>
            </div>
        </div>

        <!-- Small Category -->
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer h-48 md:h-[200px]" data-aos="fade-up"
            data-aos-delay="300">
            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=600&q=80"
                alt="Audio"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-4 left-5">
                <h3 class="text-white font-heading font-bold text-lg md:text-xl mb-1">Headphones</h3>
                <a href="category.html"
                    class="text-white/80 hover:text-white text-sm font-medium flex items-center gap-1 transition group-hover:translate-x-1">Shop
                    Now <i class="ph ph-arrow-right"></i></a>
            </div>
        </div>

        <!-- Medium Category -->
        <div class="col-span-2 relative rounded-2xl overflow-hidden group cursor-pointer h-48 md:h-[196px]"
            data-aos="fade-up" data-aos-delay="400">
            <img src="https://images.unsplash.com/photo-1572569433114-1e031eb96db9?auto=format&fit=crop&w=800&q=80"
                alt="Cameras"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-5 left-6">
                <h3 class="text-white font-heading font-bold text-xl md:text-2xl mb-1">Digital Cameras</h3>
                <a href="category.html"
                    class="text-white/80 hover:text-white font-medium flex items-center gap-1 transition group-hover:translate-x-2">Shop
                    Now <i class="ph ph-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center sm:hidden">
        <a href="category.html"
            class="inline-flex items-center justify-center gap-2 w-full border border-gray-200 bg-white font-bold text-brand-600 rounded-xl py-3 shadow-sm">View
            All Categories</a>
    </div>
</section>

<!-- Deal of the Day (Striking Gradient Box) -->
<section class="container mx-auto px-4 mb-20" data-aos="zoom-in" data-aos-duration="800">
    <div
        class="bg-gradient-to-br from-brand-900 via-brand-800 to-gray-900 rounded-3xl overflow-hidden shadow-2xl relative">
        <!-- Decorative Blur -->
        <div
            class="absolute -top-40 -left-40 w-96 h-96 bg-brand-500 rounded-full mix-blend-screen filter blur-[100px] opacity-40">
        </div>
        <div
            class="absolute -bottom-40 -right-40 w-96 h-96 bg-accent-500 rounded-full mix-blend-screen filter blur-[100px] opacity-30">
        </div>

        <div class="flex flex-col md:flex-row items-center relative z-10">
            <div class="p-8 md:p-16 lg:p-20 w-full md:w-1/2">
                <span
                    class="inline-flex items-center gap-2 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-6 shadow-[0_0_15px_rgba(239,68,68,0.5)]">
                    <i class="ph-fill ph-lightning"></i> FLASH DEAL
                </span>
                <h2 class="text-3xl md:text-5xl font-heading font-extrabold text-white mb-6 leading-tight">Apple Watch
                    <br><span class="text-brand-300">Series 9</span></h2>
                <p class="text-gray-300 text-lg mb-8 max-w-sm">Smarter. Brighter. Mightier. Get it now with an
                    exclusive 30% discount before time runs out.</p>

                <!-- Beautiful Countdown -->
                <div class="flex gap-4 mb-8" x-data="{
                    days: 3,
                    hours: 14,
                    minutes: 25,
                    seconds: 40,
                    init() {
                        setInterval(() => {
                            if (this.seconds > 0) this.seconds--;
                            else {
                                this.seconds = 59;
                                if (this.minutes > 0) this.minutes--;
                                else { this.minutes = 59; if (this.hours > 0) this.hours--;
                                    else { this.hours = 23;
                                        this.days--; } }
                            }
                        }, 1000);
                    }
                }">
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 flex flex-col items-center justify-center">
                        <span class="text-2xl md:text-3xl font-bold text-white font-heading"
                            x-text="days.toString().padStart(2, '0')">03</span>
                        <span class="text-[10px] text-gray-300 uppercase tracking-widest">Days</span>
                    </div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 flex flex-col items-center justify-center">
                        <span class="text-2xl md:text-3xl font-bold text-white font-heading"
                            x-text="hours.toString().padStart(2, '0')">14</span>
                        <span class="text-[10px] text-gray-300 uppercase tracking-widest">Hours</span>
                    </div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 flex flex-col items-center justify-center">
                        <span class="text-2xl md:text-3xl font-bold text-white font-heading"
                            x-text="minutes.toString().padStart(2, '0')">25</span>
                        <span class="text-[10px] text-gray-300 uppercase tracking-widest">Mins</span>
                    </div>
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 flex flex-col items-center justify-center">
                        <span class="text-2xl md:text-3xl font-bold text-brand-400 font-heading"
                            x-text="seconds.toString().padStart(2, '0')">40</span>
                        <span class="text-[10px] text-brand-400 uppercase tracking-widest">Secs</span>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <a href="product.html"
                        class="bg-white text-gray-900 hover:bg-brand-50 font-bold px-8 py-4 rounded-full transition-colors shadow-xl">Buy
                        Now - $299</a>
                    <span class="text-gray-400 line-through text-xl">$429</span>
                </div>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-0 flex justify-center md:justify-end relative">
                <div
                    class="w-[300px] h-[300px] md:w-[500px] md:h-[500px] bg-brand-500/20 rounded-full blur-[60px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                </div>
                <img src="https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?auto=format&fit=crop&w=800&q=80"
                    alt="Apple Watch"
                    class="relative z-10 w-full max-w-[400px] object-cover mix-blend-screen drop-shadow-2xl animate-[spin_60s_linear_infinite]"
                    style="border-radius: 50%; mask-image: radial-gradient(circle, black 70%, transparent 100%);">
            </div>
        </div>
    </div>
</section>

<!-- Premium Product Grid (Trending) -->
<section class="container mx-auto px-4 mb-20">
    <div class="flex items-end justify-between mb-10" data-aos="fade-up">
        <div>
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900">Trending Now</h2>
            <p class="text-gray-500 mt-2">Top rated products highly demanded by customers.</p>
        </div>

        <!-- Custom Tabs -->
        <div class="hidden md:flex bg-gray-100 p-1 rounded-xl" x-data="{ tab: 'all' }">
            <button @click="tab = 'all'"
                :class="tab === 'all' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-6 py-2 rounded-lg font-bold text-sm transition-all">All</button>
            <button @click="tab = 'tech'"
                :class="tab === 'tech' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-6 py-2 rounded-lg font-bold text-sm transition-all">Tech</button>
            <button @click="tab = 'fashion'"
                :class="tab === 'fashion' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-900'"
                class="px-6 py-2 rounded-lg font-bold text-sm transition-all">Fashion</button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Premium Product Card 1 -->
        <div class="product-card bg-white rounded-2xl p-4 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="100">
            <div class="absolute top-4 left-4 z-10 flex flex-col gap-2">
                <span
                    class="bg-red-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-md">-20%</span>
                <span
                    class="bg-gray-900 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-md">NEW</span>
            </div>

            <!-- Wishlist button top right -->
            <button
                class="absolute top-4 right-4 z-10 w-9 h-9 bg-white rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 shadow-sm transition-colors border border-gray-100">
                <i class="ph-fill ph-heart text-lg"></i>
            </button>

            <div
                class="relative h-[250px] bg-gray-50 rounded-xl overflow-hidden mb-4 img-swap-container p-6 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1598327105666-5b89351cb31b?auto=format&fit=crop&w=400&q=80"
                    alt="Product 1" class="max-h-full object-contain mix-blend-multiply">
                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=400&q=80"
                    alt="Product 2 Hover" class="max-h-full object-contain mix-blend-multiply">

                <!-- Quick Actions overlay -->
                <div class="action-buttons absolute bottom-4 left-0 right-0 flex justify-center gap-2 px-4">
                    <button
                        class="flex-1 bg-white hover:bg-brand-600 text-gray-900 hover:text-white text-sm font-bold py-2.5 rounded-lg shadow-lg border border-gray-100 transition-colors flex items-center justify-center gap-2">
                        <i class="ph-bold ph-shopping-cart-simple text-lg"></i> Add
                    </button>
                    <button
                        class="w-10 h-10 bg-white hover:bg-gray-900 text-gray-900 hover:text-white rounded-lg shadow-lg border border-gray-100 transition-colors flex items-center justify-center">
                        <i class="ph-bold ph-eye text-lg"></i>
                    </button>
                </div>
            </div>

            <div class="px-1">
                <div class="flex items-center gap-1 mb-1">
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star-half text-accent-500 text-xs"></i>
                    <span class="text-xs text-gray-400 ml-1">(42)</span>
                </div>
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-lg mb-1 truncate">Sony
                    Wireless Headphones</a>
                <p class="text-sm text-gray-500 mb-3">Premium Noise Cancelling</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-xl font-heading font-extrabold text-brand-600">$299.00</span>
                    <span class="text-sm text-gray-400 line-through">$359.00</span>
                </div>
            </div>
        </div>

        <!-- Premium Product Card 2 -->
        <div class="product-card bg-white rounded-2xl p-4 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="200">
            <button
                class="absolute top-4 right-4 z-10 w-9 h-9 bg-white rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 shadow-sm transition-colors border border-gray-100">
                <i class="ph-fill ph-heart text-lg"></i>
            </button>

            <div
                class="relative h-[250px] bg-gray-50 rounded-xl overflow-hidden mb-4 p-6 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">

                <div class="action-buttons absolute bottom-4 left-0 right-0 flex justify-center gap-2 px-4">
                    <button
                        class="flex-1 bg-white hover:bg-brand-600 text-gray-900 hover:text-white text-sm font-bold py-2.5 rounded-lg shadow-lg border border-gray-100 transition-colors flex items-center justify-center gap-2">
                        <i class="ph-bold ph-shopping-cart-simple text-lg"></i> Add
                    </button>
                </div>
            </div>

            <div class="px-1">
                <div class="flex items-center gap-1 mb-1">
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <span class="text-xs text-gray-400 ml-1">(128)</span>
                </div>
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-lg mb-1 truncate">Apple
                    Watch Series 8</a>
                <p class="text-sm text-gray-500 mb-3">Midnight Aluminum Case</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-xl font-heading font-extrabold text-brand-600">$399.00</span>
                </div>
            </div>
        </div>

        <!-- Premium Product Card 3 -->
        <div class="product-card bg-white rounded-2xl p-4 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="300">
            <div class="absolute top-4 left-4 z-10">
                <span
                    class="bg-accent-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-md flex items-center gap-1"><i
                        class="ph-fill ph-fire text-xs"></i> HOT</span>
            </div>

            <button
                class="absolute top-4 right-4 z-10 w-9 h-9 bg-white rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 shadow-sm transition-colors border border-gray-100">
                <i class="ph-fill ph-heart text-lg"></i>
            </button>

            <div
                class="relative h-[250px] bg-gray-50 rounded-xl overflow-hidden mb-4 p-6 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">

                <div class="action-buttons absolute bottom-4 left-0 right-0 flex justify-center gap-2 px-4">
                    <button
                        class="flex-1 bg-white hover:bg-brand-600 text-gray-900 hover:text-white text-sm font-bold py-2.5 rounded-lg shadow-lg border border-gray-100 transition-colors flex items-center justify-center gap-2">
                        <i class="ph-bold ph-shopping-cart-simple text-lg"></i> Add
                    </button>
                </div>
            </div>

            <div class="px-1">
                <div class="flex items-center gap-1 mb-1">
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph ph-star text-gray-300 text-xs"></i>
                    <span class="text-xs text-gray-400 ml-1">(15)</span>
                </div>
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-lg mb-1 truncate">MacBook
                    Pro 16" M2</a>
                <p class="text-sm text-gray-500 mb-3">Space Gray - 512GB</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-xl font-heading font-extrabold text-brand-600">$2,499.00</span>
                </div>
            </div>
        </div>

        <!-- Premium Product Card 4 -->
        <div class="product-card bg-white rounded-2xl p-4 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="400">
            <button
                class="absolute top-4 right-4 z-10 w-9 h-9 bg-white rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 shadow-sm transition-colors border border-gray-100">
                <i class="ph-fill ph-heart text-lg"></i>
            </button>

            <div
                class="relative h-[250px] bg-gray-50 rounded-xl overflow-hidden mb-4 p-6 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1572569433114-1e031eb96db9?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">

                <div class="action-buttons absolute bottom-4 left-0 right-0 flex justify-center gap-2 px-4">
                    <button
                        class="flex-1 bg-white hover:bg-brand-600 text-gray-900 hover:text-white text-sm font-bold py-2.5 rounded-lg shadow-lg border border-gray-100 transition-colors flex items-center justify-center gap-2">
                        <i class="ph-bold ph-shopping-cart-simple text-lg"></i> Add
                    </button>
                </div>
            </div>

            <div class="px-1">
                <div class="flex items-center gap-1 mb-1">
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <i class="ph-fill ph-star text-accent-500 text-xs"></i>
                    <span class="text-xs text-gray-400 ml-1">(210)</span>
                </div>
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-lg mb-1 truncate">Sony
                    Alpha a7 III Camera</a>
                <p class="text-sm text-gray-500 mb-3">Body Only, Black</p>
                <div class="flex items-baseline gap-2">
                    <span class="text-xl font-heading font-extrabold text-brand-600">$1,998.00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 text-center">
        <a href="category.html"
            class="inline-flex items-center gap-3 bg-white text-gray-900 border border-gray-200 hover:border-brand-600 hover:text-brand-600 font-bold px-8 py-3.5 rounded-xl transition-all shadow-sm hover:shadow-md">
            Load More Products <i class="ph-bold ph-spinner-gap animate-spin hidden"></i>
        </a>
    </div>
</section>

<!-- Dual Promotional Banners -->
<section class="container mx-auto px-4 mb-20" data-aos="fade-up">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Banner 1 -->
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer bg-gray-100 h-[300px]">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80"
                alt="Promo"
                class="w-full h-full object-cover mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
            <div class="absolute inset-y-0 left-0 p-8 flex flex-col justify-center">
                <span
                    class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full mb-4 w-max uppercase tracking-widest">Mega
                    Sale</span>
                <h3 class="text-white font-heading font-extrabold text-3xl mb-2">Sports Shoes</h3>
                <p class="text-gray-300 mb-6 max-w-[200px]">Up to 50% off on all premium sports collections.</p>
                <a href="category.html"
                    class="inline-flex items-center gap-2 text-white font-bold hover:text-brand-400 transition w-max">Shop
                    Now <i class="ph-bold ph-arrow-right"></i></a>
            </div>
        </div>
        <!-- Banner 2 -->
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer bg-brand-100 h-[300px]">
            <img src="https://images.unsplash.com/photo-1627384113743-6bd5a479fffd?auto=format&fit=crop&w=800&q=80"
                alt="Promo"
                class="w-full h-full object-cover mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-r from-brand-900/90 via-brand-900/50 to-transparent"></div>
            <div class="absolute inset-y-0 left-0 p-8 flex flex-col justify-center">
                <span
                    class="bg-white text-brand-900 text-xs font-bold px-3 py-1 rounded-full mb-4 w-max uppercase tracking-widest">New
                    Arrival</span>
                <h3 class="text-white font-heading font-extrabold text-3xl mb-2">Smart Gadgets</h3>
                <p class="text-brand-100 mb-6 max-w-[200px]">Upgrade your lifestyle with our latest gadgets.</p>
                <a href="category.html"
                    class="inline-flex items-center gap-2 text-white font-bold hover:text-brand-300 transition w-max">Shop
                    Now <i class="ph-bold ph-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- New Arrivals Grid (Smaller Cards) -->
<section class="container mx-auto px-4 mb-20">
    <div class="flex items-end justify-between mb-10" data-aos="fade-up">
        <div>
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900">New Arrivals</h2>
            <p class="text-gray-500 mt-2">Just added to our collection.</p>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <!-- Product 1 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="100">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <span
                    class="absolute top-2 left-2 bg-brand-600 text-white text-[9px] font-bold px-2 py-0.5 rounded uppercase">New</span>
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Wireless
                    Earbuds</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$89.00</span>
            </div>
        </div>
        <!-- Product 2 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="200">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Classic
                    Denim</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$45.00</span>
            </div>
        </div>
        <!-- Product 3 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="300">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1584916201218-f4242ceb4809?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Leather
                    Bag</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$120.00</span>
            </div>
        </div>
        <!-- Product 4 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group" data-aos="fade-up"
            data-aos-delay="400">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Smart
                    Watch</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$199.00</span>
            </div>
        </div>
        <!-- Product 5 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group hidden lg:block"
            data-aos="fade-up" data-aos-delay="500">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Apple
                    Watch</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$399.00</span>
            </div>
        </div>
        <!-- Product 6 -->
        <div class="product-card bg-white rounded-xl p-3 border border-gray-100 relative group hidden lg:block"
            data-aos="fade-up" data-aos-delay="600">
            <div class="relative h-40 bg-gray-50 rounded-lg overflow-hidden mb-3 p-4 flex items-center justify-center">
                <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad?auto=format&fit=crop&w=400&q=80"
                    alt="Product"
                    class="max-h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                <div class="action-buttons absolute bottom-2 left-0 right-0 flex justify-center gap-2 px-2">
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-shopping-cart-simple text-sm"></i></button>
                    <button
                        class="w-8 h-8 bg-white text-gray-900 hover:text-brand-600 rounded-lg shadow-lg border border-gray-100 flex items-center justify-center"><i
                            class="ph-bold ph-heart text-sm"></i></button>
                </div>
            </div>
            <div class="px-1 text-center">
                <a href="product.html"
                    class="block font-bold text-gray-900 hover:text-brand-600 transition-colors text-sm mb-1 truncate">Perfume
                    Bottle</a>
                <span class="text-sm font-heading font-extrabold text-brand-600">$65.00</span>
            </div>
        </div>
    </div>
</section>

<!-- Brand Logos -->
<section class="container mx-auto px-4 mb-20">
    <div
        class="border-y border-gray-100 py-10 flex flex-wrap justify-center gap-12 md:gap-20 items-center opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/1200px-Logo_NIKE.svg.png"
            alt="Nike" class="h-6 md:h-8 object-contain">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/1200px-Samsung_Logo.svg.png"
            alt="Samsung" class="h-4 md:h-6 object-contain">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1000px-Apple_logo_black.svg.png"
            alt="Apple" class="h-8 md:h-10 object-contain">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/1200px-Adidas_Logo.svg.png"
            alt="Adidas" class="h-8 md:h-10 object-contain">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Sony_logo.svg/1200px-Sony_logo.svg.png"
            alt="Sony" class="h-4 md:h-6 object-contain">
    </div>
</section>

<!-- Testimonials -->
<section class="bg-brand-50 py-20 mb-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900">What Our Customers Say</h2>
            <p class="text-gray-500 mt-2">Trusted by over 2 million satisfied buyers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Review 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-brand-100 relative" data-aos="fade-up"
                data-aos-delay="100">
                <i class="ph-fill ph-quotes text-5xl text-brand-100 absolute top-4 right-4"></i>
                <div class="flex text-accent-500 mb-4">
                    <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i
                        class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                </div>
                <p class="text-gray-600 mb-6 relative z-10 italic">"The delivery was incredibly fast and the product
                    quality exceeded my expectations. I will definitely be shopping here again!"</p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/100?img=1" alt="User"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 font-heading">Sarah Jenkins</h4>
                        <span class="text-xs text-gray-500">Verified Buyer</span>
                    </div>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-brand-100 relative" data-aos="fade-up"
                data-aos-delay="200">
                <i class="ph-fill ph-quotes text-5xl text-brand-100 absolute top-4 right-4"></i>
                <div class="flex text-accent-500 mb-4">
                    <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i
                        class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i>
                </div>
                <p class="text-gray-600 mb-6 relative z-10 italic">"Customer support was very helpful when I needed to
                    exchange a size. The whole process was smooth and hassle-free."</p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/100?img=2" alt="User"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 font-heading">Michael Chen</h4>
                        <span class="text-xs text-gray-500">Verified Buyer</span>
                    </div>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-brand-100 relative" data-aos="fade-up"
                data-aos-delay="300">
                <i class="ph-fill ph-quotes text-5xl text-brand-100 absolute top-4 right-4"></i>
                <div class="flex text-accent-500 mb-4">
                    <i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i class="ph-fill ph-star"></i><i
                        class="ph-fill ph-star"></i><i class="ph-fill ph-star-half"></i>
                </div>
                <p class="text-gray-600 mb-6 relative z-10 italic">"Love the UI of this website. It's so easy to find
                    what I'm looking for. The flash deals are legitimately great bargains."</p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/100?img=3" alt="User"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 font-heading">Emily Rodriguez</h4>
                        <span class="text-xs text-gray-500">Verified Buyer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest from Blog -->
<section class="container mx-auto px-4 mb-20">
    <div class="flex items-end justify-between mb-10" data-aos="fade-up">
        <div>
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900">Latest Journal</h2>
            <p class="text-gray-500 mt-2">Tips, trends, and news from our team.</p>
        </div>
        <a href="bloglist.html"
            class="hidden sm:inline-flex items-center gap-2 font-bold text-brand-600 hover:text-brand-800 transition">View
            All <i class="ph-bold ph-arrow-right"></i></a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Blog 1 -->
        <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
            <div class="rounded-2xl overflow-hidden mb-4 h-60">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80"
                    alt="Blog"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <span class="text-xs font-bold text-brand-600 mb-2 block uppercase tracking-wider">Tech & Gadgets</span>
            <a href="blog_details.html"
                class="text-xl font-heading font-bold text-gray-900 mb-2 block group-hover:text-brand-600 transition">The
                Ultimate Guide to Choosing the Right Laptop</a>
            <p class="text-gray-500 text-sm line-clamp-2">With so many options on the market, finding the perfect
                laptop can be overwhelming. In this guide...</p>
        </div>
        <!-- Blog 2 -->
        <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="200">
            <div class="rounded-2xl overflow-hidden mb-4 h-60">
                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=800&q=80"
                    alt="Blog"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <span class="text-xs font-bold text-brand-600 mb-2 block uppercase tracking-wider">Fashion</span>
            <a href="blog_details.html"
                class="text-xl font-heading font-bold text-gray-900 mb-2 block group-hover:text-brand-600 transition">Top
                10 Fall Fashion Trends You Need to Try</a>
            <p class="text-gray-500 text-sm line-clamp-2">Get ready for the cooler weather with our top picks for fall
                fashion. From oversized sweaters to classic...</p>
        </div>
        <!-- Blog 3 -->
        <div class="group cursor-pointer hidden md:block" data-aos="fade-up" data-aos-delay="300">
            <div class="rounded-2xl overflow-hidden mb-4 h-60">
                <img src="https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=800&q=80"
                    alt="Blog"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <span class="text-xs font-bold text-brand-600 mb-2 block uppercase tracking-wider">Smart Home</span>
            <a href="blog_details.html"
                class="text-xl font-heading font-bold text-gray-900 mb-2 block group-hover:text-brand-600 transition">How
                to Build a Smart Home on a Budget</a>
            <p class="text-gray-500 text-sm line-clamp-2">You don't need to spend a fortune to automate your house.
                Check out these budget-friendly devices...</p>
        </div>
    </div>
</section>

<!-- Newsletter Section with Glassmorphism -->
<section class="mb-20">
    <div class="container mx-auto px-4" data-aos="fade-up">
        <div
            class="relative rounded-3xl overflow-hidden bg-brand-900 p-8 md:p-16 flex flex-col items-center text-center">
            <!-- Background Pattern/Image -->
            <div class="absolute inset-0 opacity-20">
                <img src="https://images.unsplash.com/photo-1557683316-973673baf926?auto=format&fit=crop&w=2000&q=80"
                    alt="Background" class="w-full h-full object-cover mix-blend-luminosity">
            </div>

            <div class="relative z-10 max-w-2xl">
                <div
                    class="w-16 h-16 bg-brand-500/30 border border-brand-400/30 rounded-2xl flex items-center justify-center text-white mx-auto mb-6 backdrop-blur-sm shadow-glow">
                    <i class="ph ph-paper-plane-tilt text-3xl"></i>
                </div>
                <h2 class="text-3xl md:text-5xl font-heading font-extrabold text-white mb-4">Subscribe to our
                    Newsletter</h2>
                <p class="text-brand-100 text-lg mb-10">Get the latest updates on new products, exclusive deals, and
                    upcoming sales directly in your inbox.</p>

                <form
                    class="flex flex-col sm:flex-row gap-3 bg-white/10 backdrop-blur-md p-2 rounded-2xl border border-white/20">
                    <input type="email" placeholder="Enter your email address..."
                        class="flex-1 bg-transparent text-white px-5 py-3.5 outline-none placeholder-brand-200"
                        required>
                    <button type="submit"
                        class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-8 py-3.5 rounded-xl transition-colors shadow-lg">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
