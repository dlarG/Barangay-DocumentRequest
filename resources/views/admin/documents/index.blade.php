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
                <div class="max-w-7xl mx-auto">
                    <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                        <h2 class="text-2xl font-bold text-slate-100 mb-6">My Document Requests</h2>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Document</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Date Requested</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Status</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700">
                                    @foreach($requests as $request)
                                    <tr class="hover:bg-slate-700/50">
                                        <td class="px-6 py-4 text-slate-400">{{ $request->document->name }}</td>
                                        <td class="px-6 py-4 text-slate-400">{{ $request->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-slate-400">
                                            <span @class([
                                                'px-2 py-1 rounded-full text-xs font-medium',
                                                'bg-amber-500/20 text-amber-400' => $request->status === 'pending',
                                                'bg-green-500/20 text-green-400' => $request->status === 'approved',
                                                'bg-red-500/20 text-red-400' => $request->status === 'rejected',
                                                'bg-blue-500/20 text-blue-400' => in_array($request->status, ['processing', 'ready'])
                                            ])>
                                                {{ Str::title($request->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.documents.show', $request) }}" class="text-blue-400 hover:text-blue-300">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $requests->links() }}
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