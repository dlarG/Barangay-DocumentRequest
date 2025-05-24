<!DOCTYPE html>
<html>
<head>
    <title>Report - {{ $type }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; }
        .header { border-bottom: 2px solid #333; padding-bottom: 15px; margin-bottom: 25px; }
        .stat-card { background: #f8f9fa; border-radius: 8px; padding: 15px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ ucfirst($type) }} Report</h1>
        @if($start && $end)
        <p>Date Range: {{ $start }} to {{ $end }}</p>
        @endif
        <p>Generated: {{ now()->format('M d, Y h:i A') }}</p>
    </div>

    <div class="stats">
        <div class="stat-card">
            <h3>Total Records: {{ $report->count() }}</h3>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report as $record)
            <tr>
                <td>{{ $record->firstname }} {{$record->middlename}} {{$record->lastname}}</td>
                <td>{{ $record->email }}</td>
                <td>{{ $record->created_at->format('M d, Y') }}</td>
                <td>{{ $record->email_verified_at ? 'Verified' : 'Pending' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>