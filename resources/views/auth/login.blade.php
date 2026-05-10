<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication - Zipley</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { 
            theme: { 
                extend: { 
                    fontFamily: { sans: ['Inter', 'sans-serif'], heading: ['Outfit', 'sans-serif'] }, 
                    colors: { brand: { 50: '#f0fdfa', 100: '#ccfbf1', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e', } } 
                } 
            } 
        }
    </script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .bg-animate { background-size: 200% 200%; animation: gradientMove 10s ease infinite; }
        @keyframes gradientMove { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex">

    <main class="flex w-full min-h-screen" x-data="{ view: 'login' }">
        
        <!-- Left Side: Interactive / Visual Branding -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-brand-900 via-brand-700 to-brand-900 bg-animate relative items-center justify-center overflow-hidden p-12">
            <!-- Decorative Shapes -->
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse" style="animation-delay: 2s;"></div>
            
            <!-- Glass Content -->
            <div class="relative z-10 glass rounded-3xl p-12 max-w-lg text-white shadow-2xl transform transition-all hover:scale-105 duration-500">
                <a href="index.html" class="inline-flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-white text-brand-600 rounded-xl flex items-center justify-center font-heading font-bold text-2xl shadow-lg">Z</div>
                    <span class="text-3xl font-heading font-extrabold tracking-tight">Zipley.</span>
                </a>
                
                <div x-show="view === 'login'" x-transition.opacity>
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Welcome back to the future of shopping.</h2>
                    <p class="text-brand-100 text-lg">Sign in to access your exclusive deals, track orders, and manage your wishlist seamlessly.</p>
                </div>
                
                <div x-show="view === 'register'" x-transition.opacity style="display: none;">
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Join the Zipley Community.</h2>
                    <p class="text-brand-100 text-lg">Create an account to unlock premium features, fast checkout, and personalized recommendations.</p>
                </div>

                <div x-show="view === 'forgot' || view === 'reset'" x-transition.opacity style="display: none;">
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Secure your account.</h2>
                    <p class="text-brand-100 text-lg">We use industry-leading security to ensure your data and purchases are always safe.</p>
                </div>

                <!-- Testimonial / Social Proof -->
                <div class="mt-12 pt-8 border-t border-white/20 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700" src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700" src="https://i.pravatar.cc/100?img=3" alt="User">
                        <div class="w-10 h-10 rounded-full border-2 border-brand-700 bg-white text-brand-600 flex items-center justify-center text-xs font-bold">+2M</div>
                    </div>
                    <p class="text-sm font-medium text-brand-100">Trusted by over 2 million users worldwide</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Forms -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-24 bg-white relative">
            <a href="index.html" class="absolute top-8 right-8 text-gray-400 hover:text-gray-800 transition flex items-center gap-2 text-sm font-medium">
                <i class="ph ph-house"></i> Back to Home
            </a>

            <div class="w-full max-w-md">
                
                <!-- Login View -->
                <div x-show="view === 'login'" x-transition.opacity>
                    <div class="mb-10">
                        <h1 class="text-3xl font-heading font-bold text-gray-900 mb-2">Sign In</h1>
                        <p class="text-gray-500">Enter your email and password to access your account.</p>
                    </div>

                    <div class="flex gap-4 mb-8">
                        <button class="flex-1 border border-gray-200 rounded-xl py-3 flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-300 transition text-sm font-bold text-gray-700 shadow-sm">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google"> Google
                        </button>
                        <button class="flex-1 border border-gray-200 rounded-xl py-3 flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-300 transition text-sm font-bold text-gray-700 shadow-sm">
                            <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-5 h-5" alt="Facebook"> Facebook
                        </button>
                    </div>

                    <div class="relative flex items-center justify-center mb-8">
                        <div class="border-t border-gray-200 w-full"></div>
                        <span class="bg-white px-4 text-xs font-bold text-gray-400 absolute">OR CONTINUE WITH</span>
                    </div>

                    <form class="space-y-5" method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1.5">Email Address</label>
                            <div class="relative">
                                <input type="email" name="email" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl pl-11 pr-4 py-3.5 focus:outline-none focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10 transition-all" placeholder="john@example.com">
                                <i class="ph ph-envelope-simple absolute left-4 top-4 text-gray-400 text-lg"></i>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <label class="block text-sm font-bold text-gray-700">Password</label>
                                <a href="#" @click.prevent="view = 'forgot'" class="text-sm font-medium text-brand-600 hover:text-brand-800 transition">Forgot password?</a>
                            </div>
                            <div class="relative" x-data="{ show: false }">
                                <input :type="show ? 'text' : 'password'" name="password" class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl pl-11 pr-12 py-3.5 focus:outline-none focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10 transition-all" placeholder="••••••••">
                                <i class="ph ph-lock-key absolute left-4 top-4 text-gray-400 text-lg"></i>
                                <button type="button" @click="show = !show" class="absolute right-4 top-3.5 text-gray-400 hover:text-gray-600">
                                    <i class="ph text-lg" :class="show ? 'ph-eye-slash' : 'ph-eye'"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2 mt-2">
                            <input type="checkbox" id="remember" class="w-4 h-4 rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                            <label for="remember" class="text-sm text-gray-600 cursor-pointer">Remember me for 30 days</label>
                        </div>

                        <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl transition shadow-[0_10px_20px_rgba(13,148,136,0.2)] hover:shadow-[0_10px_20px_rgba(13,148,136,0.3)] mt-2">Sign In</button>
                    </form>

                    <p class="text-center text-gray-600 mt-8">
                        Don't have an account? <a href="#" class="text-brand-600 font-bold hover:underline">Create an account</a>
                    </p>
                </div>

            </div>
        </div>

    </main>

</body>
</html>
