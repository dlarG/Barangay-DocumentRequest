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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 mt-5">
                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 shadow-lg hover:border-slate-600 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-400 mb-1">Pending Requests</p>
                            <p class="text-3xl font-bold text-slate-100">{{ App\Models\DocumentRequest::where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 shadow-lg hover:border-slate-600 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-400 mb-1">Total Residents</p>
                            <p class="text-3xl font-bold text-slate-100">{{ Auth::user()->where('roleType', 'resident')->count()}}</p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 14 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m13 19-6-5-6 5V2a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v17Z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 shadow-lg hover:border-slate-600 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-400 mb-1">Rejected Requests</p>
                            <p class="text-3xl font-bold text-slate-100">{{ $rejected_requests }}</p>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 20 21">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 3.464V1.1m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C17 15.4 17 16 16.462 16H3.538C3 16 3 15.4 3 14.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 10 3.464ZM4 3 3 2M2 7H1m15-4 1-1m1 5h1M6.54 16a3.48 3.48 0 0 0 6.92 0H6.54Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Requests Table -->
            <div class="bg-slate-800 rounded-xl border border-slate-700 shadow-lg">
                <div class="px-6 py-4 border-b border-slate-700 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-100">Recent Requests</h3>
                    <a href="{{route('admin.documents.index')}}" class="text-blue-400 hover:text-blue-300 flex items-center text-sm transition-colors">
                        View All
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Resident</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Document Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @foreach ($requests as $request)
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-white text-sm font-medium">
                                                {{ strtoupper(substr($request->user->firstname, 0, 1)) }}{{ strtoupper(substr($request->user->lastname, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div>
                                            <div class="font-medium text-slate-100">{{ $request->user->firstname }} {{ $request->user->lastname }}</div>
                                            <div class="text-sm text-slate-400">{{ $request->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-slate-100">{{ $request->document->name }}</div>
                                    <div class="text-sm text-slate-400">Fee: ₱{{ number_format($request->document->fee, 2) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-slate-100">{{ $request->created_at->format('M d, Y') }}</div>
                                    <div class="text-sm text-slate-400">{{ $request->created_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span @class([
                                        'px-2.5 py-1 text-xs font-medium rounded-full',
                                        'bg-amber-200/10 text-amber-400' => $request->status === 'pending',
                                        'bg-green-200/10 text-green-400' => $request->status === 'approved',
                                        'bg-red-200/10 text-red-400' => $request->status === 'rejected',
                                        'bg-blue-200/10 text-blue-400' => in_array($request->status, ['processing', 'ready'])
                                    ])>
                                        {{ Str::title($request->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <form method="POST" action="{{ route('admin.documents.update', $request->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="p-2 hover:bg-green-500/10 rounded-lg text-green-400 tooltip" data-tippy-content="Approve">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </button>
                                        </form>
                                        
                                        <form method="POST" action="{{ route('admin.documents.update', $request->id) }}">
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
                    
                    <!-- Pagination -->
                    <div class="mt-6 px-6 py-4">
                        {{ $requests->links() }}
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