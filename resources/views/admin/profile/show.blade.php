<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - {{ $user->full_name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-4xl mx-auto mt-5">
                <!-- Profile Header -->
                <div class="bg-gradient-to-br from-blue-900 to-slate-900 rounded-t-2xl p-8 shadow-2xl border border-blue-800/50">
                    <div class="flex items-start gap-6">
                        <div class="relative group">
                            @if($user->profile_picture)
                                <img src="{{ asset($user->profile_picture) }}" 
                                    class="w-32 h-32 rounded-2xl object-cover border-2 border-slate-600 shadow-lg"
                                    alt="Profile picture">
                            @else
                                <div class="w-32 h-32 flex items-center justify-center rounded-2xl border-2 border-dashed border-slate-600 bg-slate-700 text-slate-400">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold mb-2">{{ $user->full_name }}</h1>
                            <div class="flex items-center gap-4 text-slate-400">
                                <span class="flex items-center gap-2 bg-blue-500/20 px-3 py-1 rounded-full text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Verified Administrator
                                </span>
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Member since {{ $user->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="bg-slate-800 rounded-b-2xl p-8 shadow-xl border border-slate-700 border-t-0 space-y-8">
                    <!-- Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Personal Information Card -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h3 class="text-lg font-semibold mb-4 flex items-center gap-3">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Personal Information
                            </h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm text-slate-400 mb-1">Full Name</dt>
                                    <dd class="text-slate-100">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</dd>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <dt class="text-sm text-slate-400 mb-1">First Name</dt>
                                        <dd class="text-slate-100">{{ $user->firstname }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-slate-400 mb-1">Last Name</dt>
                                        <dd class="text-slate-100">{{ $user->lastname }}</dd>
                                    </div>
                                </div>
                                <div>
                                    <dt class="text-sm text-slate-400 mb-1">Email Address</dt>
                                    <dd class="text-slate-100 break-all">{{ $user->email }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Account Details Card -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h3 class="text-lg font-semibold mb-4 flex items-center gap-3">
                                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Account Details
                            </h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm text-slate-400 mb-1">Role Type</dt>
                                    <dd class="text-slate-100">{{ Str::ucfirst($user->roleType) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-slate-400 mb-1">Account Status</dt>
                                    <dd class="flex items-center gap-2">
                                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                        <span class="text-slate-100">Active</span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm text-slate-400 mb-1">Last Updated</dt>
                                    <dd class="text-slate-100">{{ $user->updated_at->diffForHumans() }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Security Section -->
                    <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                        <h3 class="text-lg font-semibold mb-4 flex items-center gap-3">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Security & Authentication
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-slate-400 mb-2">Password Last Changed</p>
                                <p class="text-slate-100">2 weeks ago</p>
                            </div>
                            <div>
                                <p class="text-sm text-slate-400 mb-2">Two-Factor Authentication</p>
                                <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Disabled</span>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="border-t border-red-500/20 pt-8">
                        <div class="bg-red-900/20 p-6 rounded-xl border border-red-500/30">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <div>
                                        <h3 class="font-semibold text-red-400">Danger Zone</h3>
                                        <p class="text-sm text-red-400/70">Irreversible actions</p>
                                    </div>
                                </div>
                                <button @click="confirm('Are you absolutely sure? This will permanently delete your account!') && $refs.deleteForm.submit()"
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white text-sm flex items-center gap-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete Account
                                </button>
                            </div>
                        </div>
                        <form x-ref="deleteForm" action="{{ route('admin.profile.destroy') }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center gap-2 text-slate-400 hover:text-slate-300 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Back to Dashboard
                        </a>
                        <a href="{{ route('admin.profile.edit') }}" 
                           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>