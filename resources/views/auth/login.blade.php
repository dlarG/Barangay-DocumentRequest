<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barangay Document System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-slate-800 p-8 rounded-xl border border-slate-700 shadow-xl">
            <div class="text-center">
                <div class="flex items-center gap-2 justify-center mb-4">
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Barangay Document Request System</h1>
                </div>
                <h2 class="text-xl font-semibold text-slate-200">Sign In to Your Account</h2>
            </form>

            <form class="mt-8 space-y-6" method="POST" action="#">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-300">Email or Username</label>
                        <input type="text" name="login" required
                            class="mt-1 w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-200 placeholder-slate-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300">Password</label>
                        <input type="password" name="password" required
                            class="mt-1 w-full px-3 py-2 bg-slate-800 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-200 placeholder-slate-500">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-blue-500 focus:ring-blue-500 border border-slate-600 rounded">
                            <span class="ml-2 text-sm text-slate-400">Remember me</span>
                        </div>
                        
                        <a href="#" class="text-sm text-blue-400 hover:text-blue-300">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-2.5 px-4 bg-gradient-to-br from-blue-600 to-cyan-600 text-white rounded-lg hover:from-blue-700 hover:to-cyan-700 transition-all font-medium">
                    Sign In
                </button>

                <p class="text-center text-sm text-slate-400">
                    Don't have an account? 
                    <a href="/register" class="font-medium bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent hover:from-blue-300 hover:to-cyan-300">
                        Register here
                    </a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>