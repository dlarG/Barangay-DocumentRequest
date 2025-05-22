<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $requests = DocumentRequest::with(['user', 'document'])
        ->latest()
        ->paginate(10);

        return view('admin.dashboard', compact('requests'));
    }
}
