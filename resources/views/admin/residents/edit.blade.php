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
            <div class="bg-slate-900 p-8">
                <div class="max-w-3xl mx-auto">
                    <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                        <h2 class="text-2xl font-bold text-slate-100 mb-6">{{ isset($resident) ? 'Edit' : 'Create' }} Resident</h2>
                        
                        <form method="POST" 
                        action="{{ isset($resident) ? route('admin.residents.update', $resident) : route('admin.residents.store') }}"
                        enctype="multipart/form-data"
                        x-data="{ preview: '{{ isset($resident->profile_picture) ? asset($resident->profile_picture) : '' }}' }">
                        @csrf
                        @isset($resident) @method('PUT') @endisset

                        <!-- Profile Picture Upload -->
                        <div class="flex items-center gap-6 mb-8">
                            <div class="relative group">
                                <div class="w-32 h-32 rounded-full border-2 border-dashed border-slate-600 bg-slate-700 overflow-hidden"
                                    x-show="!preview && '{{ $resident->profile_picture }}' === ''"
                                    @click="$refs.fileInput.click()"
                                    style="cursor: pointer">
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                {{-- Show current profile picture if exists and no new preview --}}
                                @if($resident->profile_picture)
                                    <img x-bind:src="preview ? preview : '{{ asset($resident->profile_picture) }}'"
                                        x-show="preview || '{{ $resident->profile_picture }}'"
                                        class="w-32 h-32 rounded-full object-cover border-2 border-slate-600 cursor-pointer"
                                        @click="$refs.fileInput.click()"
                                        alt="Profile preview">
                                @else
                                    <img x-bind:src="preview"
                                        x-show="preview"
                                        class="w-32 h-32 rounded-full object-cover border-2 border-slate-600 cursor-pointer"
                                        @click="$refs.fileInput.click()"
                                        alt="Profile preview">
                                @endif

                                <button type="button"
                                        x-show="preview"
                                        @click="preview = ''; $refs.fileInput.value = ''"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="flex-1">
                                <label class="block text-slate-300 mb-2">Profile Picture</label>
                                <input type="file"
                                    name="profile_picture"
                                    x-ref="fileInput"
                                    @change="
                                        const file = $event.target.files[0];
                                        if (file && file.type.startsWith('image/')) {
                                            preview = URL.createObjectURL(file);
                                        } else {
                                            preview = '';
                                            $event.target.value = '';
                                        }"
                                    class="hidden"
                                    accept="image/*">
                                <p class="text-slate-400 text-sm mt-1">Click the image to upload<br>Max size: 2MB (JPEG, PNG)</p>
                                @error('profile_picture') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $resident->firstname ?? '') }}"
                                    class="form-input" required>
                                @error('firstname') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="middlename">Middle Name</label>
                                <input type="text" name="middlename" id="middlename" value="{{ old('middlename', $resident->middlename ?? '') }}"
                                    class="form-input">
                                @error('middlename') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $resident->lastname ?? '') }}"
                                    class="form-input" required>
                                @error('lastname') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Username and Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="username">Username</label>
                                <input type="text" name="username" id="username" value="{{ old('username', $resident->username ?? '') }}"
                                    class="form-input" required>
                                @error('username') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="email">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $resident->email ?? '') }}"
                                    class="form-input" required>
                                @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-input" {{ isset($resident) ? '' : 'required' }} placeholder="Leave blank to keep current password">
                                @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-input" {{ isset($resident) ? '' : 'required' }}>
                            </div>
                        </div>

                        <!-- Birthdate, Gender -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate"
                                    value="{{ old('birthdate', isset($resident->birthdate) ? \Carbon\Carbon::parse($resident->birthdate)->format('Y-m-d') : '') }}"
                                    class="form-input" required>
                                @error('birthdate') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-input" required>
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
                                    class="form-input" required>
                                @error('address') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Address, Contact -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-slate-300 mb-1" for="contact_number">Contact Number</label>
                                <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number', $resident->contact_number ?? '') }}"
                                    class="form-input" required>
                                @error('contact_number') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-slate-300 mb-1" for="roleType">Role</label>
                                <select name="roleType" id="roleType" class="form-input" required>
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