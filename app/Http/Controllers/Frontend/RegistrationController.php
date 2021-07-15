<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistrationRequest;
use App\Mail\RegistrationMail;
use App\Models\Country;
use App\Models\Membership;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class RegistrationController extends Controller
{
    public function loadRegistration(Request $request) {

        if ($request->has('paysuccess') && $request->has('exp') && $request->has('user') && $request->has('first_name') && $request->has('last_name') && $request->has('country')&& $request->has('user_type')) {
            if ($request->paysuccess !== 'success') {
                return view('Errors.404');
            }

            $output = null;
            $secret_key = '$Arn33423342';
            $secret_iv = '$Arn33423342';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256',$secret_iv),0,16);
            $output = openssl_decrypt(base64_decode($request->user),"AES-256-CBC",$key,0,$iv);

            $user = User::where('email', trim($output))->first();
            if ($user) {
                $user->type = $request->user_type;
                $user->save();
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                $userProfile->first_name = $request->first_name;
                $userProfile->last_name = $request->last_name;
                $userProfile->country = $request->country;
                $userProfile->save();
                $membership = Membership::where('user_id', $user->id)->first();
                $membership->end_date = date('Y-m-d', strtotime('+' . $request->exp . ' months', strtotime($membership->end_date)));
                $membership->last_paid_date = date('Y-m-d');
                $membership->save();
                if (Auth::loginUsingId($user->id)) {
                    return redirect('member/game/videos');
                }
            }

            $title = 'Sign up';

            $user = new User();
            $user->email = $output;
            $user->is_verified = 1;
            $user->type = $request->user_type;
            $user->is_member = 1;
            $user->status = 'Active';
            $user->save();

            $userProfile = new UserProfile();
            $userProfile->user_id = $user->id;
            $userProfile->first_name = $request->first_name;
            $userProfile->last_name = $request->last_name;
            $userProfile->country = $request->country;
            $userProfile->save();

            $membership = new Membership();
            $membership->user_id = $user->id;
            $membership->start_date = date('Y-m-d');
            $membership->end_date = date('Y-m-d', strtotime('+' . $request->exp . ' months', strtotime(date('Y-m-d'))));
            $membership->last_paid_date = date('Y-m-d');
            $membership->is_expired = 0;
            $membership->save();

            $user = User::where('id', $user->id)->with(['userProfile'])->first();
            Mail::to($user->email)->send(new RegistrationMail($user));

            return view('Frontend.registration', compact('title', 'user'));
        } else {
            return view('Errors.404');
        }



    }

    public function register(Request $request) {
        if (Auth::loginUsingId($request->id)) {
            return response()->json(['success' => true]);
        }

    }
}
