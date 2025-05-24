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
                <div class="max-w-7xl mx-auto">
                    <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                        <h2 class="text-2xl font-bold text-slate-100 mb-6">Document Types</h2>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Document</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Total Requests</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Pending Requests</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700">
                                    @foreach($documents as $document)
                                    <tr class="hover:bg-slate-700/50">
                                        <td class="px-6 py-4 text-slate-200">{{ $document->name }}</td>
                                        <td class="px-6 py-4 text-slate-400">{{ $document->requests_count }}</td>
                                        <td class="px-6 py-4 text-slate-400">
                                            {{ $document->requests->where('status', 'pending')->count() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.documents.show', $document) }}" 
                                               class="text-blue-400 hover:text-blue-300 flex items-center">
                                                View Requests
                                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $documents->links() }}
                        </div>
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