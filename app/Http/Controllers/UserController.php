<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function forgetpass(){
      
        return view('Auth.forgetPassword');
    }

    public function reset(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|confirmed',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    if ($user) {
        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect with success message
        return redirect()->route('login')->with('status', 'Password reset successfully!');
    }

    // Redirect with error if user not found
    return redirect()->back()->withErrors(['email' => 'User not found.']);
}

}
