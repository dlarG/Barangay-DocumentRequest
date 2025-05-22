<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash) {
        $user = User::findOrFail($id);
    
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Invalid verification link');
        }
    
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('info', 'Email already verified');
        }
    
        $user->markEmailAsVerified();
        event(new Verified($user));
    
        Auth::login($user, true); // Add "remember me" token
    
        return $this->verificationRedirect($user);
    }

    public function resend(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route($this->redirectRoute($request->user()))->with('info', 'Email already verified');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link resent!');
    }

    private function verificationRedirect($user) {
        switch ($user->roleType) {
            case 'admin':
                return redirect()->route('admin.dashboard')->with('success', 'Email verified successfully!');
            case 'resident':
                return redirect()->route('resident.dashboard')->with('success', 'Email verified successfully!');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Invalid user role configuration']);
        }
    }

    private function redirectRoute($user) {
        return match($user->roleType) {
            'admin' => 'admin.dashboard',
            'resident' => 'resident.dashboard',
            default => 'login',
        };
    }
}