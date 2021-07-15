<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Country;
use App\Models\Team;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index() {
        $title = 'Players | Scout Beyond';
        $activeMenu = 'Players';
        $recordPerPage = 10;
        $countries = Country::where('status', 'Active')->get();
        $teams = Team::where('status', 'Active')->get();
        $positions = [
            'GK' => 'GK',
            'RB' => 'RB',
            'LB' => 'LB',
            'RCB' => 'RCB',
            'LCB' => 'LCB',
            'DM' => 'DM',
            'CM' => 'CM',
            'AM' => 'AM',
            'RW' => 'RW',
            'LW' => 'LW',
            'S' => 'S',
        ];
        return view('Admin.players', compact('title', 'activeMenu', 'recordPerPage', 'countries', 'teams', 'positions'));
    }

    public function getRecords($teamId, $searchKey, $recordPerPage) {
        $response = User::where('type', 'Player')
            ->where(function ($query) use ($teamId) {
                if ($teamId !== 'null') {
                    $team = Team::where('id', $teamId)->first();
                    $query->whereIn('id', explode(',', $team->player_ids));
                }
            })
            ->whereHas('userProfile', function ($query) use ($searchKey) {
                if ($searchKey !== 'null') {
                    $query->where('first_name', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('last_name', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('dob', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('gender', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('country', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('city', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('phone', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('spoken_language', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('club_name', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('club_contact_name', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('club_phone', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('club_email', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('strong_leg', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('position', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('height', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('weight', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('passport_country', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('national_experience', 'like', '%' . trim($searchKey) . '%');
                }
            })
            ->with(['userProfile'])
            ->orderBy('id', 'desc')
            ->paginate($recordPerPage);

        return response()->json($response);
    }

    public function getRecord(Request $request) {
        $user = User::where('id', $request->id)->with(['userProfile'])->first();
        $team = Team::where('player_ids', 'like', '%' . $user->id . '%')->first();
        return response()->json(['user' => $user, 'team' => $team]);
    }

    public function saveRecord(PlayerRequest $request) {

        $user = $request->get('id') === null ? new User() : User::find($request->get('id'));
        $user->email = $request->email;
        $user->avatar = $request->hasFile('avatar') ? $request->file('avatar')->storeAs('images/players', time() . '.' . $request->file('avatar')->getClientOriginalExtension(), 'public') : $user->avatar;
        $user->type = 'Player';
        $user->is_verified = $request->get('id') === null ? 0 : $user->is_verified;
        $user->status = $request->status;
        $user->save();


        $userProfile = $request->get('id') === null ? new UserProfile() : UserProfile::where('user_id', $user->id)->first();
        $userProfile->user_id = $user->id;
        $userProfile->first_name = $request->first_name;
        $userProfile->last_name = $request->last_name;
        $userProfile->dob = date('Y-m-d', strtotime($request->dob));
        $userProfile->gender = $request->gender;
        $userProfile->country = $request->country;
        $userProfile->city = $request->city;
        $userProfile->phone = $request->phone;
        $userProfile->spoken_language = $request->spoken_language;
        $userProfile->club_name = $request->club_name;
        $userProfile->club_contact_name = $request->club_contact_name;
        $userProfile->club_phone = $request->club_phone;
        $userProfile->club_email = $request->club_email;
        $userProfile->strong_leg = $request->strong_leg;
        $userProfile->position = $request->position;
        $userProfile->height = $request->height;
        $userProfile->weight = $request->weight;
        $userProfile->passport_country = $request->passport_country;
        $userProfile->passport_url = $request->hasFile('passport_url') ? $request->file('passport_url')->storeAs('images/passport_files', time() . '.' . $request->file('passport_url')->getClientOriginalExtension(), 'public') : $userProfile->passport_url;
        $userProfile->national_experience = $request->national_experience;
        $userProfile->user_story = $request->user_story;
        $userProfile->save();

        if ($request->team_id !== null) {
            $team = Team::where('id', $request->team_id)->first();
            $playerIds = explode(',', $team->player_ids);
            if ( ! in_array($user->id, $playerIds)) {
                array_push($playerIds, $user->id);
                $team->player_ids = implode(',', $playerIds);
                $team->save();
            }
        } else {
            $team = Team::where('player_ids', 'like', '%' . $user->id . '%')->first();
            if ($team) {
                $playerIds = explode(',', $team->player_ids);
                $key = array_search($user->id, $playerIds);
                if ($key !== false) {
                    unset($playerIds[$key]);
                    $team->player_ids = implode(',', $playerIds);
                    $team->save();
                }
            }
        }

        return response()->json(['success' => true]);
    }


}
