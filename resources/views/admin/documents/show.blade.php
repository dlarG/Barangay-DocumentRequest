{{-- filepath: resources/views/admin/documents/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-3xl mx-auto bg-slate-800 rounded-xl p-8 shadow-lg border border-slate-700 mt-8">
                <h2 class="text-2xl font-bold text-slate-100 mb-6">Document Request Details</h2>
                <div class="space-y-4">
                    <div>
                        <span class="text-slate-400">Requested By:</span>
                        <span class="text-slate-100 font-semibold">
                            {{ $documentRequest->user->firstname ?? 'N/A' }} {{ $documentRequest->user->lastname ?? '' }}
                        </span>
                    </div>
                    <div>
                        <span class="text-slate-400">Document:</span>
                        <span class="text-slate-100 font-semibold">{{ $documentRequest->document->name ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400">Purpose:</span>
                        <span class="text-slate-100">{{ $documentRequest->purpose }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400">Status:</span>
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            @if($documentRequest->status === 'pending') bg-amber-500/20 text-amber-400
                            @elseif($documentRequest->status === 'approved') bg-green-500/20 text-green-400
                            @elseif($documentRequest->status === 'rejected') bg-red-500/20 text-red-400
                            @else bg-blue-500/20 text-blue-400 @endif">
                            {{ Str::title($documentRequest->status) }}
                        </span>
                    </div>
                    <div>
                        <span class="text-slate-400">Admin Notes:</span>
                        <span class="text-slate-100">{{ $documentRequest->admin_notes ?? '—' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400">Requested At:</span>
                        <span class="text-slate-100">{{ $documentRequest->created_at->format('M d, Y h:i A') }}</span>
                    </div>
                    @if($documentRequest->approved_at)
                    <div>
                        <span class="text-slate-400">Approved At:</span>
                        <span class="text-slate-100">{{ $documentRequest->approved_at->format('M d, Y h:i A') }}</span>
                    </div>
                    @endif
                </div>
                <div class="mt-8">
                    <a href="{{ route('admin.documents.index') }}" class="text-blue-400 hover:text-blue-300">&larr; Back to Requests</a>
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