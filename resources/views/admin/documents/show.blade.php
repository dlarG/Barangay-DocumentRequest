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
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-slate-100">{{ $document->name }} Requests</h2>
                            <a href="{{ route('admin.documents.index') }}" 
                               class="text-blue-400 hover:text-blue-300 flex items-center">
                                Back to Documents
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Resident</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Date Requested</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Status</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700">
                                    @foreach($document->requests as $request)
                                    <tr class="hover:bg-slate-700/50">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-3">
                                                    {{ strtoupper(substr($request->user->firstname, 0, 1)) }}{{ strtoupper(substr($request->user->lastname, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div class="font-medium text-slate-100">{{ $request->user->full_name }}</div>
                                                    <div class="text-sm text-slate-400">{{ $request->user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-400">{{ $request->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4">
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
                                            <div class="flex space-x-2">
                                                <form method="POST" action="{{ route('admin.documents.update', $request) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="p-2 hover:bg-green-500/10 rounded-lg text-green-400 tooltip" data-tippy-content="Approve">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                
                                                <form method="POST" action="{{ route('admin.documents.update', $request) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg text-red-400 tooltip" data-tippy-content="Reject">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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