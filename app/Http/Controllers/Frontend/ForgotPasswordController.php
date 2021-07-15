<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResettingMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function loadForgotPassword() {
        $title = 'Forgot Password';
        return view('Frontend.forgot_password', compact('title'));
    }

    public function sendResetCode(Request $request) {
        $request->validate([
            'email' => [
                'required'
            ],
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password_reset_code = mt_rand(100000, 999999);
            $user->save();
            Mail::to($user->email)->send(new PasswordResettingMail($user));
            return response()->json(['success' => true, 'message' => 'Sending Reset Code Successful', 'data' => $user]);
        }
        return response()->json(['success' => false, 'message' => 'Unrecognized Email Address!']);
    }

    public function loadPasswordResetCode($userId) {
        $title = 'Password Reset Code';
        return view('Frontend.password_reset_code', compact('title', 'userId'));
    }

    public function verifyResetCode(Request $request) {
        $request->validate([
            'password_reset_code' => [
                'required'
            ],
            'user_id' => [
                'required'
            ]
        ]);

        if (User::where('id', base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($request->user_id))))))->where('password_reset_code', $request->password_reset_code)->first()) {
            return response()->json(['success' => true, 'message' => 'Verifying Reset Code Successful', 'data' => ['user_id' => $request->user_id, 'password_reset_code' => $request->password_reset_code]]);
        }
        return response()->json(['success' => false, 'message' => 'Invalid Reset Code!']);
    }

    public function loadResetPassword($userId, $passwordResetCode) {
        $title = 'Password Reset Code';
        return view('Frontend.reset_password', compact('title', 'userId', 'passwordResetCode'));
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                'min:6'
            ],
            'password_confirmation' => [
                'required',
                'min:6'
            ],
            'user_id' => [
                'required'
            ],
            'password_reset_code' => [
                'required'
            ]

        ]);
        $user = User::where('id', base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($request->user_id))))))->where('password_reset_code', base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($request->password_reset_code))))))->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->password_reset_code = null;
            $user->save();
            return response()->json(['success' => true, 'message' => 'Resetting Password Successful']);
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong!']);
    }
}
