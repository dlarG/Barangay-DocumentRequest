<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="bg-slate-900 min-h-screen p-8">
            <div class="max-w-3xl mx-auto">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-100 mb-6">{{ isset($resident) ? 'Edit' : 'Create' }} Resident</h2>
                    
                    <form method="POST" 
                        action="{{ isset($resident) ? route('admin.residents.update', $resident) : route('admin.residents.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @isset($resident) @method('PUT') @endisset

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $resident->firstname ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('firstname') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="middlename">Middle Name</label>
                                <input type="text" name="middlename" id="middlename" value="{{ old('middlename', $resident->middlename ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2">
                                @error('middlename') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $resident->lastname ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('lastname') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="username">Username</label>
                                <input type="text" name="username" id="username" value="{{ old('username', $resident->username ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('username') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $resident->email ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    {{ isset($resident) ? '' : 'required' }}>
                                @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    {{ isset($resident) ? '' : 'required' }}>
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $resident->birthdate ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('birthdate') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="gender">Gender</label>
                                <select name="gender" id="gender"
                                        class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                        required>
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender', $resident->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $resident->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $resident->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="address">Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $resident->address ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('address') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="contact_number">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $resident->contact_number ?? '') }}"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    required>
                                @error('contact_number') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="profile_picture">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture"
                                    class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                    accept="image/*">
                                @error('profile_picture') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                                @if(isset($resident) && $resident->profile_picture)
                                    <img src="{{ asset($resident->profile_picture) }}" alt="Profile Picture" class="w-20 h-20 rounded-full mt-2">
                                @endif
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="roleType">Role</label>
                                <select name="roleType" id="roleType"
                                        class="w-full rounded-lg border border-slate-600 bg-slate-700 text-slate-100 p-2"
                                        required>
                                    <option value="resident" {{ old('roleType', $resident->roleType ?? '') == 'resident' ? 'selected' : '' }}>Resident</option>
                                    <option value="admin" {{ old('roleType', $resident->roleType ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('roleType') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="submit" 
                                    class="bg-gradient-to-br from-blue-600 to-cyan-600 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-cyan-700 transition-all">
                                {{ isset($resident) ? 'Update' : 'Create' }} Resident
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </main>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/@popperjs/core@2"></script>
    <script src="//unpkg.com/tippy.js@6"></script>
    <script>
        tippy('[data-tippy-content]', {
            arrow: false,
            theme: 'translucent',
        });
    </script>
</body>
</html>