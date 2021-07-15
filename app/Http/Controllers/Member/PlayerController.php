<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Mail\ContactPlayerMail;
use App\Models\Favorite;
use App\Models\GameVideo;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PlayerController extends Controller
{
    public function loadPlayers() {
        $title = 'Players';
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
        return view('Member.players', compact('title', 'positions'));
    }

    public function getRecords($position, $searchKey) {

        return response()->json([
            'players' => User::
                where('type', 'Player')
                ->whereHas('userProfile', function ($query) use($position, $searchKey) {
                    if ($position !== 'null') {
                        $query->where('position', $position);
                    }
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
                ->get(),
            'favoritePlayers' => Favorite::where('user_id', auth()->user()->id)->where('item_type', 'Player')->get()
        ]);
    }

    public function loadPlayerProfile($playerId) {
        $title = 'Player Profile';
        $player = User::where('id', $playerId)->with(['userProfile'])->first();
        $teamId = Team::where('player_ids', 'like', '%' . $playerId . '%')->first(['id'])->id;
        $gameVideos = GameVideo::where('team_id1', $teamId)->orWhere('team_id2', $teamId)->get();
        if (Favorite::where('user_id', auth()->user()->id)->where('item_id', $playerId)->where('item_type', 'Player')->first()) {
            $isFavorite = true;
        } else {
            $isFavorite = false;
        }
        return view('Member.player_profile', compact('title', 'player', 'gameVideos', 'isFavorite'));
    }





    public function sendMessage(Request $request) {
        $request->validate([
            'club_email' => [
                'required'
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
        Mail::to($request->club_email)->cc('info@scoutbeyond.com')->send(new ContactPlayerMail($request->subject, $messageObject));
        return response()->json(['success' => true, 'message' => 'Message Sent to the Player Club Email']);

    }


    public function addToFavorite(Request $request) {
        $request->validate([
            'item_id' => [
                'required',
                'numeric'
            ]
        ]);
        $favorite = new Favorite();
        $favorite->user_id = auth()->user()->id;
        $favorite->item_id = $request->item_id;
        $favorite->item_type = 'Player';
        $favorite->save();
        return response()->json(['success' => true, 'message' => 'Player has been added to favorite.']);
    }

    public function removeFromFavorite(Request $request) {
        $request->validate([
            'item_id' => [
                'required',
                'numeric'
            ]
        ]);

        Favorite::where('item_id', $request->item_id)->where('user_id', auth()->user()->id)->where('item_type', 'Player')->delete();

        return response()->json(['success' => true, 'message' => 'Player has been removed from favorite.']);
    }
}
