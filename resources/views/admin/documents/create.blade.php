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
            <div class="max-w-4xl mx-auto">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-100 mb-6">Create New Document Type</h2>
                    
                    <form method="POST" action="{{ route('admin.documents.store') }}">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label class="block text-slate-300 mb-2">Document Name *</label>
                                <input type="text" name="name" required
                                    class="form-input"
                                    placeholder="e.g. Business Permit">
                                @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-slate-300 mb-2">Description</label>
                                <textarea name="description" rows="3"
                                    class="form-input"
                                    placeholder="Optional description"></textarea>
                                @error('description') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-slate-300 mb-2">Fee *</label>
                                    <input type="number" name="fee" step="0.01" required
                                        class="form-input"
                                        placeholder="0.00">
                                    @error('fee') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-slate-300 mb-2">Processing Days *</label>
                                    <input type="number" name="processing_days" required
                                        class="form-input"
                                        placeholder="Number of days">
                                    @error('processing_days') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-slate-300 mb-2">Requirements *</label>
                                <textarea name="requirements" rows="5" required
                                    class="form-input"
                                    placeholder="Enter one requirement per line"></textarea>
                                <p class="text-slate-400 text-sm mt-2">Enter each requirement on a new line</p>
                                @error('requirements') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="border-t border-slate-700 pt-6">
                                <button type="submit" 
                                        class="bg-gradient-to-br from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition-all">
                                    Create Document Type
                                </button>
                            </div>
                        </div>
                    </form>
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