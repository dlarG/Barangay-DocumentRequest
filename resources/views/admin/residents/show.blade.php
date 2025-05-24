<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $resident->full_name }} Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-4xl mx-auto mt-5">
                <!-- Profile Header -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-t-xl p-6 shadow-xl border border-slate-700">
                    <div class="flex items-start gap-6">
                        <div class="relative group">
                            @if ($resident->profile_picture)
                                <img src="{{ asset($resident->profile_picture) }}" alt="Profile Picture"
                                    class="w-32 h-32 rounded-2xl object-cover border-2 border-slate-600 shadow-lg">
                            @else
                                <div class="w-32 h-32 flex items-center justify-center rounded-2xl border-2 border-dashed border-slate-600 bg-slate-700 text-slate-400">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex-1">
                            <h1 class="text-2xl font-bold mb-1">{{ $resident->firstname }} {{ $resident->middlename}} {{ $resident->lastname}}</h1>
                            <div class="flex items-center gap-3 text-slate-400">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ ucfirst($resident->roleType) }}
                                </span>
                                <span class="text-slate-600">•</span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $resident->email }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="bg-slate-800 rounded-b-xl p-6 shadow-xl border border-slate-700 border-t-0">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Personal Info Card -->
                        <div class="bg-slate-700/30 p-5 rounded-xl border border-slate-700">
                            <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Personal Information
                            </h3>
                            <dl class="space-y-3 text-sm">
                                <div>
                                    <dt class="text-slate-400">ID</dt>
                                    <dd class="text-slate-100">#{{ $resident->id }}</dd>
                                </div>
                                <div>
                                    <dt class="text-slate-400">Birthdate</dt>
                                    <dd class="text-slate-100">{{ \Carbon\Carbon::parse($resident->birthdate)->format('M d, Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-slate-400">Gender</dt>
                                    <dd class="text-slate-100 capitalize">{{ $resident->gender }}</dd>
                                </div>
                                <div>
                                    <dt class="text-slate-400">Member Since</dt>
                                    <dd class="text-slate-100">{{ $resident->created_at->format('M d, Y') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Contact Info Card -->
                        <div class="bg-slate-700/30 p-5 rounded-xl border border-slate-700">
                            <h3 class="font-semibold text-lg mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Contact Information
                            </h3>
                            <dl class="space-y-3 text-sm">
                                <div>
                                    <dt class="text-slate-400">Address</dt>
                                    <dd class="text-slate-100">{{ $resident->address }}</dd>
                                </div>
                                <div>
                                    <dt class="text-slate-400">Contact Number</dt>
                                    <dd class="text-slate-100">{{ $resident->contact_number }}</dd>
                                </div>
                                <div>
                                    <dt class="text-slate-400">Last Updated</dt>
                                    <dd class="text-slate-100">{{ $resident->updated_at->diffForHumans() }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="mt-8 border-t border-red-500/20 pt-8">
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
                                <button 
                                    @click="if(confirm('Are you absolutely sure? This will permanently delete the resident record and cannot be undone.')) { document.getElementById('delete-form').submit() }"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white text-sm flex items-center gap-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete Resident
                                </button>
                            </div>
                        </div>
                        <form id="delete-form" action="{{ route('admin.residents.destroy', $resident) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    <!-- Back and Edit -->
                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('admin.residents.index') }}" class="text-blue-400 hover:text-blue-300 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Back to Residents
                        </a>
                        <a href="{{ route('admin.residents.edit', $resident) }}" class="text-slate-300 hover:text-white flex items-center gap-1">
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