<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-4xl mx-auto mt-5">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-100 mb-6">Document Settings</h2>

                    <form method="POST" action="{{ route('admin.settings.update-documents') }}">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            @foreach($documents as $document)
                            <div class="bg-slate-700 p-4 rounded-xl">
                                <h3 class="text-lg font-semibold text-slate-300 mb-4">{{ $document->name }}</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-slate-300 mb-2">Fee</label>
                                        <input type="number" name="documents[{{ $document->id }}][fee]" 
                                            value="{{ old('documents.'.$document->id.'.fee', $document->fee) }}"
                                            class="form-input" step="0.01" required>
                                    </div>

                                    <div>
                                        <label class="block text-slate-300 mb-2">Processing Days</label>
                                        <input type="number" name="documents[{{ $document->id }}][processing_days]" 
                                            value="{{ old('documents.'.$document->id.'.processing_days', $document->processing_days) }}"
                                            class="form-input" required>
                                    </div>

                                    <div>
                                        <label class="block text-slate-300 mb-2">Requirements</label>
                                        <textarea name="documents[{{ $document->id }}][requirements]"
                                                class="form-input h-32"
                                                required>{{ old('documents.'.$document->id.'.requirements', implode("\n", $document->requirements)) }}</textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="documents[{{ $document->id }}][id]" value="{{ $document->id }}">
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-6 border-t border-slate-700 pt-6">
                            <button type="submit" 
                                    class="bg-gradient-to-br from-green-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-blue-700 transition-all">
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