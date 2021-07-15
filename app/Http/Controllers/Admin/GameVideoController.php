<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameVideoRequest;
use App\Models\Favorite;
use App\Models\Formation;
use App\Models\GameVideo;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\Facades\Vimeo;

class GameVideoController extends Controller
{
    public function index() {
        $title = 'Game Videos | Scout Beyond';
        $activeMenu = 'Game Videos';
        $recordPerPage = 10;
        $teams = Team::where('status', 'Active')->get();


        return view('Admin.game_videos', compact('title', 'activeMenu', 'recordPerPage', 'teams'));
    }

    public function getRecords($teamId, $searchString, $recordPerPage) {
        $response = GameVideo::

            where(function ($query) use ($teamId) {
                if ($teamId !== 'null') {
                    $query->where('team_id1', $teamId);
                    $query->orWhere('team_id2', $teamId);
                }
            })
            ->where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('title', 'like', '%' . $searchString . '%');
                }
            })
            ->with(['team1', 'team2'])
            ->orderBy('id', 'desc')
            ->paginate($recordPerPage);

        return response()->json($response);
    }

    public function getRecord(Request $request) {
        return response()->json(GameVideo::where('id', $request->id)->with(['team1', 'team2'])->first());
    }

    public function saveRecord(GameVideoRequest $request) {

        if ($request->hasFile('video_url')) {
            $videoFileName = time() . '.' . $request->file('video_url')->getClientOriginalExtension();
            $videoPath = $request->file('video_url')->move(public_path('uploads'), $videoFileName);
            $videoUrl = Vimeo::upload($videoPath, [
                'name' => $request->title,
            ]);
            unlink($videoPath);
            $video = Vimeo::request($videoUrl);
        }

        if ($request->hasFile('video_thumbnail_url')) {
            $highlightVideoFileName = time() . '.' . $request->file('video_thumbnail_url')->getClientOriginalExtension();
            $highlightVideoPath = $request->file('video_thumbnail_url')->move(public_path('uploads'), $highlightVideoFileName);
            $highlightVideoUrl = Vimeo::upload($highlightVideoPath, [
                'name' => 'Highlight of ' . $request->title,
            ]);
            unlink($highlightVideoPath);
            $highlightVideo = Vimeo::request($highlightVideoUrl);
        }

        $data = $request->get('id') === null ? new GameVideo() : GameVideo::find($request->get('id'));
        $data->title = $request->title;
        $data->team_id1 = $request->team_id1;
        $data->team_id2 = $request->team_id2;
        $data->top_player_id = 0;
        $data->man_of_the_match_id = 0;
        $data->team1_formation_name = $request->team1_formation_name;
        $data->team2_formation_name = $request->team2_formation_name;
        $data->team1_formation_url = $request->hasFile('team1_formation_url') ? $request->file('team1_formation_url')->storeAs('images/game_video_formations', $request->team_id1 . '_' . time() . '.' . $request->file('team1_formation_url')->getClientOriginalExtension(), 'public') : $data->team1_formation_url;
        $data->team2_formation_url = $request->hasFile('team2_formation_url') ? $request->file('team2_formation_url')->storeAs('images/game_video_formations', $request->team_id2 . '_' . time() . '.' . $request->file('team2_formation_url')->getClientOriginalExtension(), 'public') : $data->team2_formation_url;
        $data->video_thumbnail_url = $request->hasFile('video_thumbnail_url') ? explode('"', $highlightVideo['body']['embed']['html'])[1] : $data->video_thumbnail_url;
        $data->video_url = $request->hasFile('video_url') ? explode('"', $video['body']['embed']['html'])[1] : $data->video_url;
        $data->report_url = $request->hasFile('report_url') ? $request->file('report_url')->storeAs('report/game_videos', time() . '.' . $request->file('report_url')->getClientOriginalExtension(), 'public') : $data->report_url;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->save();
        return response()->json($data);


    }

//    public function deleteRecord(Request $request) {
//        GameVideo::where('id', $request->id)->delete();
//        return response()->json(['success' => true]);
//    }

    public function getTeamPlayers(Request $request) {
        $players = [];

        $team1 = Team::where('id', $request->team_id1)->first();
        if ($team1) {
            $usersForTeam1 = User::whereIn('id', explode(',', $team1->player_ids))->with(['userProfile'])->get();
            foreach ($usersForTeam1 as $userForTeam1) {
                array_push($players, [
                    'id' => $userForTeam1->id,
                    'first_name' => $userForTeam1->userProfile->first_name,
                    'last_name' => $userForTeam1->userProfile->last_name,
                ]);
            }
        }

        $team2 = Team::where('id', $request->team_id2)->first();
        if ($team2) {
            $usersForTeam2 = User::whereIn('id', explode(',', $team2->player_ids))->with(['userProfile'])->get();
            foreach ($usersForTeam2 as $userForTeam2) {
                array_push($players, [
                    'id' => $userForTeam2->id,
                    'first_name' => $userForTeam2->userProfile->first_name,
                    'last_name' => $userForTeam2->userProfile->last_name,
                ]);
            }
        }

        return response()->json($players);
    }


    public function loadGameVideo($gameVideoId) {
        $title = 'Game Video | Scout Beyond';
        $activeMenu = 'Game Video';
        $gameVideo = GameVideo::where('id', $gameVideoId)->with(['team1', 'team2'])->first();
//        if (Favorite::where('user_id', auth()->user()->id)->where('item_id', $gameVideo->id)->where('item_type', 'Video')->first()) {
//            $isFavorite = true;
//        } else {
//            $isFavorite = false;
//        }
        $team1Players = User::whereIn('id', explode(',', Team::where('id', $gameVideo->team1->id)->first(['player_ids'])->player_ids))->with(['userProfile'])->get();
        $team2Players = User::whereIn('id', explode(',', Team::where('id', $gameVideo->team2->id)->first(['player_ids'])->player_ids))->with(['userProfile'])->get();
        return view('Admin.game_video', compact('title', 'gameVideo', 'team1Players', 'team2Players', 'activeMenu'));
    }
}
