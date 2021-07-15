<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function loadMembership() {
        $title = 'Membership';
        $membership = Membership::where('user_id', auth()->user()->id)->first();
        return view('Member.membership', compact('title', 'membership'));
    }
}
