<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900" x-data="{ preview: '{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : '' }}' }">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-slate-800 rounded-xl shadow-2xl border border-slate-700">
                    <!-- Header with Gradient Background -->
                    <div class="bg-gradient-to-r from-blue-800 to-slate-900 rounded-t-xl p-6 border-b border-slate-700">
                        <div class="flex items-center gap-4">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <h1 class="text-2xl font-bold text-slate-100">Edit Admin Profile</h1>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="p-6 space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture Upload -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h2 class="text-lg font-semibold text-slate-300 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Profile Picture
                            </h2>

                            <div class="flex items-center gap-8">
                                <!-- Preview -->
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full border-2 border-dashed border-slate-600 overflow-hidden bg-slate-700">
                                        <img x-show="preview" :src="preview" 
                                             class="w-full h-full object-cover"
                                             alt="Profile preview">
                                        <div x-show="!preview" class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload Controls -->
                                <div class="flex-1">
                                    <input type="file" name="profile_picture" id="profile_picture" 
                                           class="hidden"
                                           @change="preview = URL.createObjectURL($event.target.files[0])">
                                    <label for="profile_picture" 
                                           class="px-4 py-2 bg-slate-700 hover:bg-slate-600 rounded-lg text-slate-300 cursor-pointer transition-colors">
                                        Choose New Photo
                                    </label>
                                    <p class="text-slate-400 text-sm mt-2">JPG, PNG or GIF (Max 2MB)</p>
                                    @error('profile_picture')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information Card -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h2 class="text-lg font-semibold text-slate-300 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Personal Information
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- [Existing name fields] -->

                                <div>
                                    <label class="block text-slate-300 mb-3">Birthdate</label>
                                    <input type="date" name="birthdate" 
                                           value="{{ old('birthdate', $user->birthdate->format('Y-m-d')) }}"
                                           class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                    @error('birthdate')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-slate-300 mb-3">Gender</label>
                                    <select name="gender" 
                                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            required>
                                        <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $user->gender) === 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Card -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h2 class="text-lg font-semibold text-slate-300 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Contact Information
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-slate-300 mb-3">Address</label>
                                    <input type="text" name="address" 
                                           value="{{ old('address', $user->address) }}"
                                           class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                    @error('address')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-slate-300 mb-3">Contact Number</label>
                                    <input type="tel" name="contact_number" 
                                           value="{{ old('contact_number', $user->contact_number) }}"
                                           class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                    @error('contact_number')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h2 class="text-lg font-semibold text-slate-300 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Personal Information
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-slate-300 mb-3">First Name</label>
                                    <input type="text" name="firstname" value="{{ old('firstname', $user->firstname) }}"
                                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    @error('firstname')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-slate-300 mb-3">Middle Name</label>
                                    <input type="text" name="middlename" value="{{ old('middlename', $user->middlename) }}"
                                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    @error('middlename')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-slate-300 mb-3">Last Name</label>
                                    <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}"
                                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    @error('lastname')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Account Security Card -->
                        <div class="bg-slate-700/30 p-6 rounded-xl border border-slate-700">
                            <h2 class="text-lg font-semibold text-slate-300 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Account Security
                            </h2>

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-slate-300 mb-3">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    @error('email')
                                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-slate-300 mb-3">New Password</label>
                                        <input type="password" name="password"
                                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            placeholder="Leave blank to keep current">
                                        @error('password')
                                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-slate-300 mb-3">Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 text-slate-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            placeholder="Confirm new password">
                                    </div>
                                </div>

                                <div class="text-slate-400 text-sm">
                                    <p>Password requirements:</p>
                                    <ul class="list-disc list-inside mt-1">
                                        <li>Minimum 8 characters</li>
                                        <li>At least one uppercase letter</li>
                                        <li>At least one number</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end gap-4 border-t border-slate-700 pt-8">
                            <a href="{{ route('admin.profile.show') }}" 
                               class="px-6 py-3 border border-slate-600 rounded-lg text-slate-300 hover:bg-slate-700/50 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 rounded-lg text-white flex items-center gap-2 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>