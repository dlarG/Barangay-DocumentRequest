<nav class="ml-64 fixed w-[calc(100%-16rem)] h-16 bg-slate-900 border-b border-gray-700 shadow-sm px-6 flex items-center justify-between z-[999]">
    <!-- Left Section -->
    <div class="flex items-center space-x-4">
        <h1 class="text-gray-300 font-medium">
            {{Auth::user()->firstname}} {{ Auth::user()->middlename}} {{Auth::user()->lastname }} 
            <span class="text-gray-400 font-normal">- {{ Str::ucfirst(Auth::user()->roleType) }}</span>
        </h1>
    </div>

    <!-- Right Section -->
    <div class="flex items-center space-x-6">
        <button class="text-gray-400 hover:text-blue-400 relative transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
            </svg>
            <span class="absolute top-0.5 right-0.5 w-2 h-2 bg-blue-500 rounded-full"></span>
        </button>

        <!-- Profile Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center space-x-3 group" style="cursor: pointer">
                <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-medium">
                    {{ strtoupper(substr(Auth::user()->firstname, 0, 1)) }}{{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                </div>
                <div class="text-left">
                    <p class="text-sm font-medium text-gray-300 group-hover:text-white transition-colors">{{ Auth::user()->full_name }}</p>
                    <p class="text-xs text-gray-400 group-hover:text-gray-300 transition-colors">Administrator</p>
                </div>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 bg-slate-800 rounded-lg shadow-xl py-2 border border-gray-700 z-50">
                <a href="{{ route('admin.profile.show') }}" class="px-4 py-2.5 text-sm text-gray-300 hover:bg-slate-700 flex items-center space-x-2 transition-colors">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    <span>Profile</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2.5 text-sm text-gray-300 hover:bg-slate-700 flex items-center space-x-2 transition-colors">
                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>