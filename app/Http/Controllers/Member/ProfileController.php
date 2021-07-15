<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

use App\Http\Requests\Member\ProfileRequest;
use App\Mail\ContactPlayerMail;
use App\Models\Country;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function loadProfile() {
        $title = 'Profile';
        $genders = [
            'Male' => 'Male',
            'Female' => 'Female'
        ];
        $countries = Country::where('status', 'Active')->get();
        return view('Member.profile', compact('title', 'genders', 'countries'));
    }

    public function saveProfile(ProfileRequest $request) {

//        if($request->hasfile('passport_url')) {
//            $passportUrls = [];
//            foreach($request->file('passport_url') as $file)
//            {
//                $path = Storage::disk('public')->putFileAs(
//                    'images/passport_files', $file, auth()->user()->id . '-' . time() . '.' . $file->clientExtension()
//                );
//                array_push($passportUrls, $path);
//                sleep(1);
//            }
//        }

        $userProfile = UserProfile::where('user_id', auth()->user()->id)->first();

        $userProfile->first_name = $request->first_name;
        $userProfile->last_name = $request->last_name;
//        $userProfile->dob = date('Y-m-d', strtotime($request->dob));
//        $userProfile->gender = $request->gender;
        $userProfile->country = $request->country;
//        $userProfile->city = $request->city;
        $userProfile->phone = $request->phone;
//        $userProfile->spoken_language = $request->spoken_language;
        $userProfile->club_name = $request->club_name;
//        $userProfile->club_contact_name = $request->club_contact_name;
//        $userProfile->club_phone = $request->club_phone;
//        $userProfile->club_email = $request->club_email;
//        $userProfile->strong_leg = $request->strong_leg;
//        $userProfile->position = $request->position;
//        $userProfile->height = $request->height;
//        $userProfile->weight = $request->weight;
//        $userProfile->passport_country = $request->passport_country;
//        $userProfile->passport_url = implode(',', $passportUrls);
//        $userProfile->national_experience = $request->national_experience;
        $userProfile->save();

//        $request->session()->regenerate();
        return response()->json(['success' => true, 'message' => 'Profile Information Updated Successfully', 'data' => $userProfile]);
    }


    public function saveProfilePhoto(Request $request) {
        $request->validate([
            'avatar' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
//                Rule::dimensions()->maxWidth(500)->maxHeight(500)->ratio(1 / 1),
                'max:2048',
            ]
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        Storage::disk('public')->delete($user->avatar);
        $user->avatar = $request->file('avatar')->storeAs('images/players', time() . '.' . $request->file('avatar')->getClientOriginalExtension(), 'public');
        $user->save();
        return response()->json(['success' => true]);
    }


}
