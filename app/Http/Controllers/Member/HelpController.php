<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Mail\ContactAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
{
    public function loadHelp() {
        $title = 'Help';
        return view('Member.help', compact('title'));
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'name' => [
                'required',
                'max:255'
            ],
            'subject' => [
                'required',
                'max:255'
            ],
            'message' => [
                'required',
                'max:10000'
            ]
        ]);

        $messageObject = new \stdClass();
        $messageObject->message = $request->message;
        Mail::to('info@scoutbeyond.com')->send(new ContactAdminMail($request->name, auth()->user()->email, $request->subject, $messageObject));
        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully']);

    }
}
