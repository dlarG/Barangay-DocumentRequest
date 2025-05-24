<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document as ModelsDocument;
use App\Models\DocumentRequest;
use Dom\Document;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    public function index()
    {
        $documents = ModelsDocument::withCount('requests')->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function update(Request $request, DocumentRequest $documentRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,processing,ready',
        ]);

        $documentRequest->update([
            'status' => $validated['status'],
            'approved_at' => $validated['status'] === 'approved' ? now() : null
        ]);

        return back()->with('success', 'Request updated successfully');
    }
    
    public function show(ModelsDocument $document)
    {
        $document->load(['requests.user' => function($query) {
            $query->latest();
        }]);
        
        return view('admin.documents.show', compact('document'));
    }
}
