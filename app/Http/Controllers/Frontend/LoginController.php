<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginRequest;
use App\Mail\MembershipExpiryNoticeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function loadLogin(Request $request) {
        $title = 'Log in';
        if ($request->has('exp') && $request->has('email')) {
            $email = $request->email;
            $exp = $request->exp;
        } else {
            $email = null;
            $exp = null;
        }
        return view('Frontend.login', compact('title', 'email', 'exp'));
    }

    public function authenticateLogin(LoginRequest $request) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Active'])) {
            $request->session()->regenerate();
            if ((int)\auth()->user()->is_member === 1) {
                if (date('Y-m-d') >= date_format(date_sub(date_create(\auth()->user()->membership->end_date), date_interval_create_from_date_string("7 days")), 'Y-m-d')) {
                    $user = User::where('id', \auth()->user()->id)->with(['userProfile', 'membership'])->first();
                    Mail::to($user->email)->send(new MembershipExpiryNoticeMail($user));
                }
            }
            return response()->json(['success' => true, 'message' => 'Authorized Access', 'data' => auth()->user()]);
        }
        return response()->json(['success' => false, 'message' => 'Unauthorized Access!']);
    }

    public function authenticateDirectLogin(Request $request) {
        $output = null;
        $secret_key = '$Arn33423342';
        $secret_iv = '$Arn33423342';
        $key = hash('sha256',$secret_key);
        $iv = substr(hash('sha256',$secret_iv),0,16);
        $output = openssl_decrypt(base64_decode($request->data),"AES-256-CBC",$key,0,$iv);
        $user = User::where('email', trim($output))->first();
        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                if ((int)\auth()->user()->is_member === 1) {
                    if (date('Y-m-d') >= date_format(date_sub(date_create(\auth()->user()->membership->end_date), date_interval_create_from_date_string("7 days")), 'Y-m-d')) {
                        $user = User::where('id', $user->id)->with(['userProfile'])->first();
                        Mail::to($user->email)->send(new MembershipExpiryNoticeMail($user));
                    }
                }
                return redirect('member/game/videos');
            }

        } else {
            return redirect('login/invalid');
        }

    }

    public function invalidLogin() {
        $title = 'Invalid Login';
        return view('Frontend.invalid_login', compact('title'));
    }

    public function encryptAndDecrypt($stringToHandle = "",$encryptDecrypt = 'e'){
        $output = null;
        $secret_key = '$Arn33423342';
        $secret_iv = '$Arn33423342';
        $key = hash('sha256',$secret_key);
        $iv = substr(hash('sha256',$secret_iv),0,16);
        if($encryptDecrypt == 'e'){
            $output = base64_encode(openssl_encrypt($stringToHandle,"AES-256-CBC",$key,0,$iv));
        } else if($encryptDecrypt == 'd'){
            $output = openssl_decrypt(base64_decode($stringToHandle),"AES-256-CBC",$key,0,$iv);
        }
        return $output;
    }

    public function logout() {
        $user = \auth()->user();
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        if ($user->is_member === 1) {
            return redirect('https://melsystech.io/scoutbeyond/wp-login.php?action=logout');
        }
        return redirect('/');
    }

}
