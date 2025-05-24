<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Result</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="max-w-6xl mx-auto">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-slate-100">
                            {{ ucfirst($type) }} Report 
                            @if($start && $end)
                            <span class="text-sm text-slate-400">({{ $start }} to {{ $end }})</span>
                            @endif
                        </h2>
                        <form method="POST" action="{{ route('admin.reports.export') }}">
                            @csrf
                            <input type="hidden" name="report_type" value="{{ $type }}">
                            <input type="hidden" name="start_date" value="{{ $start }}">
                            <input type="hidden" name="end_date" value="{{ $end }}">
                            <button type="submit" 
                                    class="bg-gradient-to-br from-red-600 to-orange-600 text-white px-4 py-2 rounded-lg hover:from-red-700 hover:to-orange-700 transition-all flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Export PDF
                            </button>
                        </form>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Total Records</p>
                            <p class="text-2xl font-bold text-slate-100">{{ $report->count() }}</p>
                        </div>
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Date Range</p>
                            <p class="text-2xl font-bold text-slate-100">
                                {{ $start ?: 'N/A' }} - {{ $end ?: 'N/A' }}
                            </p>
                        </div>
                        <div class="bg-slate-700 p-4 rounded-xl">
                            <p class="text-sm text-slate-400">Last Updated</p>
                            <p class="text-2xl font-bold text-slate-100">{{ now()->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="overflow-x-auto rounded-lg border border-slate-700">
                        <table class="w-full">
                            <thead class="bg-slate-700">
                                <tr>
                                    <th class="py-3 px-6 text-left text-slate-300">Name</th>
                                    <th class="py-3 px-6 text-left text-slate-300">Email</th>
                                    <th class="py-3 px-6 text-left text-slate-300">Registration Date</th>
                                    <th class="py-3 px-6 text-left text-slate-300">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700">
                                @forelse($report as $record)
                                <tr class="hover:bg-slate-750 transition-colors">
                                    <td class="py-4 px-6 text-slate-300">{{ $record->firstname }} {{$record->middlename}} {{$record->lastname}}</td>
                                    <td class="py-4 px-6 text-slate-300">{{ $record->email }}</td>
                                    <td class="py-4 px-6 text-slate-300">{{ $record->created_at->format('M d, Y') }}</td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 rounded-full text-sm 
                                            {{ $record->email_verified_at ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                            {{ $record->email_verified_at ? 'Verified' : 'Pending' }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-4 px-6 text-center text-slate-400">No records found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>