<aside class="w-64 fixed h-screen bg-slate-900 border-r border-gray-700 shadow-2xl">
    <div class="p-1">
        <!-- Logo -->
        <div class="flex items-center gap-3 p-3 rounded-lg">
            <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-white font-semibold text-lg">Brgy. Portal</span>
        </div>
        <hr style="color:grey; opacity: 0.5; ">

        <!-- Navigation -->
        <nav class="mt-8 space-y-1.5">
            <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.dashboard') ? 'text-white bg-blue-500/10 border border-blue-500/20' : 'text-gray-300 hover:text-white hover:bg-blue-500/10' }}
            rounded-xl transition-all duration-200">
                {{-- Dashboard icon --}}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.5V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v6.75M3 13.5l9 6 9-6M3 13.5l9 6 9-6"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ route('admin.documents.index') }}"
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.documents.*') ? 'text-white bg-gray-800 border border-blue-500/20' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}
            rounded-xl transition-all duration-200">
                {{-- Document icon --}}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                </svg>
                <span>Document Requests</span>
                <span class="ml-auto bg-blue-500/20 text-blue-400 text-xs px-2 py-1 rounded-full">15+</span>
            </a>

            <a href="{{ route('admin.residents.index') }}" 
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.residents.*') ? 'text-white bg-gray-800 border border-blue-500/20' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}
            rounded-xl transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
                <span>Residents</span>
            </a>

            <a href="{{ route('admin.reports.index') }}" 
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.reports.*') ? 'text-white bg-gray-800 border border-blue-500/20' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}
            rounded-xl transition-all duration-200">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                </svg>
                <span>Reports</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" 
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.settings.*') ? 'text-white bg-gray-800 border border-blue-500/20' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}
            rounded-xl transition-all duration-200">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Settings</span>
            </a>

            <a href="{{ route('admin.profile.show') }}" 
            class="flex items-center gap-3 p-3.5 text-sm font-medium
            {{ request()->routeIs('admin.profile.*') ? 'text-white bg-gray-800 border border-blue-500/20' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}
            rounded-xl transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
                <span>Profile</span>
            </a>
        </nav>
    </div>
</aside>