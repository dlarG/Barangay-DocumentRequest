<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:documents',
            'description' => 'nullable|string',
            'requirements' => 'required|string',
            'fee' => 'required|numeric|min:0',
            'processing_days' => 'required|integer|min:1'
        ]);

        Document::create($validated);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Document type created successfully');
    }
    public function show(Document $document)
    {
        return view('admin.documents.details', [
            'document' => $document->load('requests')
        ]);
    }
}
