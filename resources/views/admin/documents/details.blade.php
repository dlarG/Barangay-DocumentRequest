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
            <div class="max-w-7xl mx-auto mt-8">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-slate-100">{{ $document->name }}</h2>
                        <a href="{{ route('admin.documents.show', $document) }}" 
                        class="bg-gradient-to-br from-blue-600 to-cyan-600 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-cyan-700 transition-all">
                            View All Requests
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Processing Fee</p>
                            <p class="text-2xl font-bold text-slate-100">₱{{ number_format($document->fee, 2) }}</p>
                        </div>
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Processing Time</p>
                            <p class="text-2xl font-bold text-slate-100">{{ $document->processing_days }} days</p>
                        </div>
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Total Requests</p>
                            <p class="text-2xl font-bold text-slate-100">{{ $document->requests_count }}</p>
                        </div>
                    </div>

                    <div class="bg-slate-700 p-4 rounded-xl">
                        <h3 class="text-lg font-semibold text-slate-300 mb-4">Requirements</h3>
                        <ul class="list-disc pl-5 space-y-2 text-slate-300">
                            @foreach($document->requirements as $requirement)
                            <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @if($document->description)
                    <div class="mt-6 bg-slate-700 p-4 rounded-xl">
                        <h3 class="text-lg font-semibold text-slate-300 mb-2">Description</h3>
                        <p class="text-slate-300">{{ $document->description }}</p>
                    </div>
                    @endif
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