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
            <div class="max-w-6xl mx-auto mt-5">
                <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold text-slate-100 mb-6">Generate Report</h2>
                    
                    <form method="POST" action="{{ route('admin.reports.generate') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Report Type -->
                            <div>
                                <label class="block text-slate-300 mb-2">Report Type</label>
                                <select name="report_type" class="form-input" required>
                                    <option value="">Select Report Type</option>
                                    <option value="residents">Residents Report</option>
                                    <option value="documents">Document Requests</option>
                                    <option value="users">System Users</option>
                                </select>
                            </div>

                            <!-- Date Range -->
                            <div>
                                <label class="block text-slate-300 mb-2">Date Range</label>
                                <div class="flex gap-3">
                                    <input type="date" name="start_date" class="form-input flex-1" placeholder="Start Date">
                                    <input type="date" name="end_date" class="form-input flex-1" placeholder="End Date">
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-slate-700 pt-6">
                            <button type="submit" 
                                    class="bg-gradient-to-br from-purple-600 to-blue-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all">
                                Generate Report
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