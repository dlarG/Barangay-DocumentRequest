<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = User::where('roleType', 'resident')->latest()->paginate(10);
        return view('admin.residents.index', compact('residents'));
    }
    public function create()
    {
        return view('admin.residents.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9_]+$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'roleType' => ['required', 'string', 'in:resident,admin'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:15', 'regex:/^\+?[0-9]{10,15}$/'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['profile_picture'] = 'images/' . $filename;
        }
        $validated['roleType'] = 'resident'; // Ensure the roleType is set to 'resident'
        // Create the user
        $user = User::create($validated);

        // Send email verification
        event(new Registered($user));

        return redirect()->route('admin.residents.index')->with('success', 'Resident created successfully. Verification email sent.');
    }
    public function edit(User $resident)
    {
        return view('admin.residents.edit', compact('resident'));
    }

    public function update(Request $request, User $resident)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $resident->id, 'regex:/^[a-zA-Z0-9_]+$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email,' . $resident->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'roleType' => ['required', 'string', 'in:resident,admin'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required', 'string', 'in:male,female,other'],
            'address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:15', 'regex:/^\+?[0-9]{10,15}$/'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        // Only update password if provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['profile_picture'] = 'images/' . $filename;
        }

        $resident->update($validated);

        return redirect()->route('admin.residents.index')->with('success', 'Resident updated successfully.');
    }
    public function destroy(User $resident)
    {
        $resident->delete();
        return redirect()->route('admin.residents.index')->with('success', 'Resident deleted successfully.');
    }
    public function show(User $resident)
    {
        return view('admin.residents.show', compact('resident'));
    }
}
