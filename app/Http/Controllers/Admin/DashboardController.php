<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $requests = DocumentRequest::with(['user', 'document'])
        ->latest()
        ->paginate(10);
        $rejected_requests = DocumentRequest::where('status', 'rejected')->count();

        return view('admin.dashboard', compact('requests', 'rejected_requests'));
    }
}
