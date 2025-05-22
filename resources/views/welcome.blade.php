<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brgy. Document Request System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900">
    <!-- Navigation -->
    <nav class="fixed w-full h-16 bg-slate-900 border-b border-slate-700 shadow-sm px-6 flex items-center justify-between z-50">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-white font-semibold text-lg">Brgy. Portal</span>
        </div>

        <div class="hidden md:flex items-center gap-8">
            <a href="#" class="text-slate-300 hover:text-blue-400 transition-colors">Home</a>
            <a href="#" class="text-slate-300 hover:text-blue-400 transition-colors">Features</a>
            <a href="#" class="text-slate-300 hover:text-blue-400 transition-colors">Documents</a>
            <a href="{{ route('login') }}" class="bg-gradient-to-br from-blue-500 to-blue-600 px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-colors">Login</a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-slate-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
            </svg>
        </button>
    </nav>

    <!-- Hero Section -->
    <div class="pt-32 pb-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-slate-100 mb-6">
                    Modern Document Request System for Your 
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Barangay</span>
                </h1>
                <p class="text-xl text-slate-400 mb-8 max-w-3xl mx-auto">
                    Request barangay documents online anytime, anywhere. Track your request status in real-time and receive notifications when your document is ready for pickup.
                </p>
                <a href="{{ route('login') }}" class="bg-gradient-to-br from-blue-500 to-cyan-500 px-8 py-4 rounded-xl text-lg font-medium hover:from-blue-600 hover:to-cyan-600 transition-colors inline-flex items-center gap-2">
                    Get Started
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20 bg-slate-800/50 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-slate-100 text-center mb-16">Why Choose Our System</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Online Requests</h3>
                    <p class="text-slate-400">Submit document requests 24/7 without visiting the barangay hall</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Real-time Tracking</h3>
                    <p class="text-slate-400">Monitor your request status through our secure portal</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Secure Portal</h3>
                    <p class="text-slate-400">Government-level security for your personal data</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Mobile-Friendly</h3>
                    <p class="text-slate-400">Access the system from any smartphone or tablet</p>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-slate-100 text-center mb-16">How It Works</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Submit Request</h3>
                    <p class="text-slate-400">Fill out the online form with required details</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Wait for Processing</h3>
                    <p class="text-slate-400">Track real-time status updates in your dashboard</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold text-white">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-slate-100 mb-2">Claim Document</h3>
                    <p class="text-slate-400">Receive notification and pick up at barangay hall</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-slate-800/50 py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-slate-100 mb-6">Ready to Get Started?</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">Join hundreds of residents who are already using our modern document request system</p>
            <a href="{{ route('login') }}" class="bg-gradient-to-br from-blue-500 to-cyan-500 px-8 py-4 rounded-xl text-lg font-medium hover:from-blue-600 hover:to-cyan-600 transition-colors inline-flex items-center gap-2">
                Request Document Now
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-700">
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-slate-100 font-semibold mb-4">Brgy. Portal</h3>
                    <p class="text-slate-400 text-sm">Modern document request system for efficient barangay services</p>
                </div>
                <div>
                    <h4 class="text-slate-100 font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">About Us</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">FAQs</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-slate-100 font-semibold mb-4">Documents</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">Certificates</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">Permits</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-blue-400 text-sm transition-colors">Clearances</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-slate-100 font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li class="text-slate-400 text-sm">brgy.portal@email.com</li>
                        <li class="text-slate-400 text-sm">(02) 1234-5678</li>
                        <li class="text-slate-400 text-sm">Open 8:00 AM - 5:00 PM</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-12 pt-8 text-center">
                <p class="text-slate-400 text-sm">&copy; 2025 Brgy. Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>