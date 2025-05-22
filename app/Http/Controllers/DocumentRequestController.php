<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Dom\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentRequestController extends Controller
{
    public function index()
    {
        $requests = Auth::user()->documentRequests()->with('document')->latest()->paginate(10);
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $documents = Document::all();
        return view('requests.create', compact('documents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_id' => 'required|exists:documents,id',
            'purpose' => 'required|string|max:500'
        ]);

        DocumentRequest::create([
            'user_id' => Auth::id(),
            'document_id' => $validated['document_id'],
            'purpose' => $validated['purpose']
        ]);

        return redirect()->route('requests.index')->with('success', 'Request submitted successfully');
    }
}
