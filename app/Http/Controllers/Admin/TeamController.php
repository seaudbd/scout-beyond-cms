<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $title = 'Teams | Scout Beyond';
        $activeMenu = 'Teams';
        $recordPerPage = 10;
        return view('Admin.teams', compact('title', 'activeMenu', 'recordPerPage'));
    }

    public function getRecords($searchKey, $recordPerPage) {
        $response = Team::
            where(function ($query) use ($searchKey) {
                if ($searchKey !== 'null') {
                    $query->where('name', 'like', '%' . trim($searchKey) . '%');
                    $query->orWhere('manager', 'like', '%' . trim($searchKey) . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->paginate($recordPerPage);

        return response()->json($response);
    }

    public function getRecord(Request $request) {
        $team = Team::where('id', $request->id)->first();
        $teamPlayers = User::whereIn('id', explode(',', $team->player_ids))->with(['userProfile'])->get();
        return response()->json(['team' => $team, 'teamPlayers' => $teamPlayers]);
    }

    public function saveRecord(TeamRequest $request) {

        $data = $request->get('id') === null ? new Team() : Team::find($request->get('id'));
        $data->name = $request->name;
        $data->logo = $request->hasFile('logo') ? $request->file('logo')->storeAs('images/team_logos', time() . '.' . $request->file('logo')->getClientOriginalExtension(), 'public') : $data->logo;
        $data->manager = $request->manager;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->save();
        return response()->json(['success' => true]);
    }



    public function deleteTeamPlayer(Request $request) {
        $team = Team::where('id', $request->team_id)->first();
        $playerIds = explode(',', $team->player_ids);
        $key = array_search($request->user_id, $playerIds);
        if ($key !== false) {
            unset($playerIds[$key]);
            $team->player_ids = implode(',', $playerIds);
            $team->save();
        }
        return response()->json(['success' => true]);
    }
}
