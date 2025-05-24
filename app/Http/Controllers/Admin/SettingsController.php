<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('admin.settings.index', compact('documents'));
    }

    public function updateDocumentSettings(Request $request)
    {
        $validated = $request->validate([
            'documents' => 'required|array',
            'documents.*.id' => 'required|exists:documents,id',
            'documents.*.fee' => 'required|numeric|min:0',
            'documents.*.processing_days' => 'required|integer|min:1',
            'documents.*.requirements' => 'required|string',
        ]);

        foreach ($validated['documents'] as $documentData) {
            $document = Document::find($documentData['id']);
            $document->update([
                'fee' => $documentData['fee'],
                'processing_days' => $documentData['processing_days'],
                'requirements' => $documentData['requirements']
            ]);
        }

        return back()->with('success', 'Document settings updated successfully');
    }
}