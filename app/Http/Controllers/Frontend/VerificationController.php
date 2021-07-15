<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request) {
        User::where('id', $request->user_id)->update(['is_verified' => 1, 'status' => 'Active']);
        return redirect('/');
    }
}
