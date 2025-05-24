<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|in:residents,documents,users',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $data = $this->getReportData($validated);
        
        return view('admin.reports.results', [
            'report' => $data,
            'type' => $validated['report_type'],
            'start' => $validated['start_date'],
            'end' => $validated['end_date']
        ]);
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getReportData($request->all());
        
        $pdf = FacadePdf::loadView('admin.reports.pdf', [
            'report' => $data,
            'type' => $request->type,
            'start' => $request->start,
            'end' => $request->end
        ]);

        return $pdf->download('report-'.now()->format('Y-m-d').'.pdf');
    }

    private function getReportData($params)
    {
        $query = User::query();

        if ($params['start_date'] && $params['end_date']) {
            $query->whereBetween('created_at', [
                $params['start_date'],
                $params['end_date']
            ]);
        }

        // Add more report types as needed
        switch ($params['report_type']) {
            case 'residents':
                return $query->where('roleType', 'resident')->get();
            case 'users':
                return $query->where('roleType', '!=', 'resident')->get();
            default:
                return collect();
        }
    }
}