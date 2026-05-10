<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication - Zipley</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .bg-animate {
            background-size: 200% 200%;
            animation: gradientMove 10s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex">

    <main class="flex w-full min-h-screen" x-data="{ view: 'login' }">

        <!-- Left Side: Interactive / Visual Branding -->
        <div
            class="hidden lg:flex w-1/2 bg-gradient-to-br from-brand-900 via-brand-700 to-brand-900 bg-animate relative items-center justify-center overflow-hidden p-12">
            <!-- Decorative Shapes -->
            <div
                class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-400 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse">
            </div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-accent-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-pulse"
                style="animation-delay: 2s;"></div>

            <!-- Glass Content -->
            <div
                class="relative z-10 glass rounded-3xl p-12 max-w-lg text-white shadow-2xl transform transition-all hover:scale-105 duration-500">
                <a href="index.html" class="inline-flex items-center space-x-3 mb-8">
                    <div
                        class="w-12 h-12 bg-white text-brand-600 rounded-xl flex items-center justify-center font-heading font-bold text-2xl shadow-lg">
                        Z</div>
                    <span class="text-3xl font-heading font-extrabold tracking-tight">Zipley.</span>
                </a>

                <div x-show="view === 'login'" x-transition.opacity>
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Welcome back to the future of
                        shopping.</h2>
                    <p class="text-brand-100 text-lg">Sign in to access your exclusive deals, track orders, and manage
                        your wishlist seamlessly.</p>
                </div>

                <div x-show="view === 'register'" x-transition.opacity style="display: none;">
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Join the Zipley Community.</h2>
                    <p class="text-brand-100 text-lg">Create an account to unlock premium features, fast checkout, and
                        personalized recommendations.</p>
                </div>

                <div x-show="view === 'forgot' || view === 'reset'" x-transition.opacity style="display: none;">
                    <h2 class="text-4xl font-heading font-extrabold mb-4 leading-tight">Secure your account.</h2>
                    <p class="text-brand-100 text-lg">We use industry-leading security to ensure your data and purchases
                        are always safe.</p>
                </div>

                <!-- Testimonial / Social Proof -->
                <div class="mt-12 pt-8 border-t border-white/20 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700"
                            src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700"
                            src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-brand-700"
                            src="https://i.pravatar.cc/100?img=3" alt="User">
                        <div
                            class="w-10 h-10 rounded-full border-2 border-brand-700 bg-white text-brand-600 flex items-center justify-center text-xs font-bold">
                            +2M</div>
                    </div>
                    <p class="text-sm font-medium text-brand-100">Trusted by over 2 million users worldwide</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Forms -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-24 bg-white relative">
            <a href="index.html"
                class="absolute top-8 right-8 text-gray-400 hover:text-gray-800 transition flex items-center gap-2 text-sm font-medium">
                <i class="ph ph-house"></i> Back to Home
            </a>

            <div class="w-full max-w-md">

                <!-- Reset Password Confirmation View -->
                <div>
                    <div class="text-center">
                        <div
                            class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm border border-green-100">
                            <i class="ph-fill ph-paper-plane-tilt text-4xl"></i>
                        </div>
                        <h1 class="text-3xl font-heading font-bold text-gray-900 mb-4">Check Your Email</h1>
                        <p class="text-gray-500 mb-8 leading-relaxed">We have sent a password reset link to <br><span
                                class="font-bold text-gray-900">john@example.com</span>. Please check your inbox and
                            spam folder.</p>

                        <button type="button" @click="view = 'login'"
                            class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg mb-6">Return
                            to Sign In</button>

                        <p class="text-sm text-gray-500">Didn't receive the email? <button
                                class="text-brand-600 font-bold hover:underline ml-1">Click to resend</button></p>
                    </div>
                </div>

            </div>
        </div>

    </main>

</body>

</html>
