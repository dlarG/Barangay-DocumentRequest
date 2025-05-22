<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    public function index()
    {
        $requests = DocumentRequest::with(['user', 'document'])->latest()->paginate(10);
        return view('admin.documents.index', compact('requests'));
    }

    public function update(Request $request, DocumentRequest $documentRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,processing,ready',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $documentRequest->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'],
            'approved_at' => $validated['status'] === 'approved' ? now() : null
        ]);

        return back()->with('success', 'Request updated successfully');
    }
}
