<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function create()
    {
        return view('auth.change-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:6',
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            User::find(auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);
            return redirect()->back()->with('success', 'Password successfully updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }
}
