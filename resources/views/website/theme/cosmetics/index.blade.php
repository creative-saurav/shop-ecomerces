<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zipley - Cosmetics & Beauty HTML Template</title>
    <!-- Google Fonts: Cinzel & Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Lato', 'sans-serif'],
                        heading: ['Cinzel', 'serif'],
                    },
                    colors: {
                        brand: {
                            50: '#fff1f2',
                            100: '#ffe4e6',
                            500: '#f43f5e',
                            600: '#e11d48', // Soft Rose
                            700: '#be123c',
                            900: '#881337',
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-brand-50 text-gray-800 font-sans antialiased selection:bg-brand-500 selection:text-white">
    
    <!-- Top Announcement -->
    <div class="bg-brand-900 text-brand-100 text-[11px] uppercase tracking-widest text-center py-2">
        Complimentary shipping on all orders over $75
    </div>

    <!-- Elegant Header -->
    <header class="bg-transparent absolute top-8 left-0 w-full z-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center pb-6 border-b border-gray-300/30">
                <!-- Logo -->
                <a href="index.html" class="text-4xl font-heading font-bold tracking-widest text-brand-900 mb-6">
                    ZIPLEY
                </a>
                
                <div class="flex w-full items-center justify-between">
                    <nav class="hidden md:flex items-center gap-10 text-xs font-bold uppercase tracking-widest text-gray-800">
                        <a href="index_5.html" class="text-brand-600 border-b border-brand-600 pb-1">Skincare</a>
                        <a href="category.html" class="hover:text-brand-600 transition">Makeup</a>
                        <a href="category.html" class="hover:text-brand-600 transition">Fragrance</a>
                    </nav>

                    <div class="flex items-center space-x-6 text-gray-800 ml-auto md:ml-0">
                        <button class="hover:text-brand-600 transition"><i class="ph ph-magnifying-glass text-xl"></i></button>
                        <a href="login.html" class="hover:text-brand-600 transition"><i class="ph ph-user text-xl"></i></a>
                        <a href="cart.html" class="relative hover:text-brand-600 transition">
                            <i class="ph ph-handbag text-xl"></i>
                            <span class="absolute -top-1.5 -right-1.5 bg-brand-600 text-white text-[9px] w-4 h-4 flex items-center justify-center rounded-full">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="h-screen relative flex items-center justify-center pt-32">
            <div class="absolute inset-0 z-0 bg-brand-100">
                <img src="https://images.unsplash.com/photo-1616683693504-3ea7e9ad6fec?auto=format&fit=crop&w=2000&q=80" alt="Cosmetics" class="w-full h-full object-cover mix-blend-multiply opacity-50">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-50 to-transparent"></div>
            </div>
            
            <div class="container mx-auto px-4 relative z-10 text-center">
                <span class="text-brand-900 font-bold tracking-[0.3em] uppercase text-xs mb-6 block">The Summer Collection</span>
                <h1 class="text-5xl md:text-7xl font-heading font-medium text-brand-900 leading-tight mb-8">Pure Botanical <br>Beauty.</h1>
                <a href="category.html" class="inline-block bg-brand-900 hover:bg-brand-600 text-white font-bold uppercase tracking-widest text-xs px-12 py-4 transition-colors">
                    Shop The Collection
                </a>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-24 container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-heading font-medium text-brand-900 mb-4">Cult Favorites</h2>
                <p class="text-gray-500 max-w-md mx-auto italic">Our most loved essentials for your daily ritual.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Product -->
                <div class="text-center group">
                    <div class="relative bg-white rounded-t-full pt-12 px-8 pb-8 mb-6 overflow-hidden flex items-center justify-center h-80 shadow-[0_20px_50px_rgba(225,29,72,0.05)]">
                        <img src="https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=600&q=80" alt="Serum" class="max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <h3 class="text-xl font-heading font-medium text-brand-900 mb-2">Radiance Serum</h3>
                    <p class="text-brand-600 font-bold tracking-widest text-sm mb-4">$85.00</p>
                    <button class="text-xs uppercase tracking-widest font-bold text-gray-900 border-b border-gray-900 pb-1 hover:text-brand-600 hover:border-brand-600 transition">Add to Bag</button>
                </div>

                <!-- Product -->
                <div class="text-center group">
                    <div class="relative bg-white rounded-t-full pt-12 px-8 pb-8 mb-6 overflow-hidden flex items-center justify-center h-80 shadow-[0_20px_50px_rgba(225,29,72,0.05)]">
                        <img src="https://images.unsplash.com/photo-1599305090598-fe179d501227?auto=format&fit=crop&w=600&q=80" alt="Cream" class="max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <h3 class="text-xl font-heading font-medium text-brand-900 mb-2">Hydrating Face Cream</h3>
                    <p class="text-brand-600 font-bold tracking-widest text-sm mb-4">$60.00</p>
                    <button class="text-xs uppercase tracking-widest font-bold text-gray-900 border-b border-gray-900 pb-1 hover:text-brand-600 hover:border-brand-600 transition">Add to Bag</button>
                </div>

                <!-- Product -->
                <div class="text-center group">
                    <div class="relative bg-white rounded-t-full pt-12 px-8 pb-8 mb-6 overflow-hidden flex items-center justify-center h-80 shadow-[0_20px_50px_rgba(225,29,72,0.05)]">
                        <img src="https://images.unsplash.com/photo-1580870059737-1249b6b7bc1a?auto=format&fit=crop&w=600&q=80" alt="Oil" class="max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <h3 class="text-xl font-heading font-medium text-brand-900 mb-2">Botanical Body Oil</h3>
                    <p class="text-brand-600 font-bold tracking-widest text-sm mb-4">$45.00</p>
                    <button class="text-xs uppercase tracking-widest font-bold text-gray-900 border-b border-gray-900 pb-1 hover:text-brand-600 hover:border-brand-600 transition">Add to Bag</button>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-brand-100 py-16 text-center border-t border-brand-200">
        <h2 class="text-3xl font-heading font-bold mb-6 text-brand-900">ZIPLEY</h2>
        <div class="flex justify-center gap-8 text-xs uppercase tracking-widest text-brand-900 mb-12 font-bold">
            <a href="#" class="hover:text-brand-600 transition">Instagram</a>
            <a href="#" class="hover:text-brand-600 transition">Facebook</a>
        </div>
        <p class="text-[10px] uppercase tracking-widest text-brand-900/60">© 2026 ZIPLEY BEAUTY. ALL RIGHTS RESERVED.</p>
    </footer>
</body>
</html>
