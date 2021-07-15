<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\GameVideo;
use App\Models\GameVideoPreference;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class GameVideoController extends Controller
{
    public function loadGameVideos() {
        $title = 'Game Videos';
        return view('Member.game_videos', compact('title'));
    }

    public function getRecords($sortBy, $searchKey) {
        return response()->json([
            'gameVideos' => GameVideo::where('status', 'Active')
                ->where(function ($query) use ($searchKey) {
                    if ($searchKey !== 'null') {
                        $query->where('title', 'like', '%' . $searchKey . '%');
                    }
                })
                ->with(['team1', 'team2', 'gameVideoPreferences'])
                ->orderBy('id', $sortBy)
                ->get(),
            'favoriteGameVideos' => Favorite::where('user_id', auth()->user()->id)->where('item_type', 'Video')->get()
        ]);

    }

    public function loadGameVideo($gameVideoId) {
        $title = 'Game Video';
        $gameVideo = GameVideo::where('id', $gameVideoId)->with(['team1', 'team2', 'gameVideoPreferences'])->first();
        $gameVideo->total_view_count = $gameVideo->total_view_count + 1;
        $gameVideo->save();
        if (Favorite::where('user_id', auth()->user()->id)->where('item_id', $gameVideo->id)->where('item_type', 'Video')->first()) {
            $isFavorite = true;
        } else {
            $isFavorite = false;
        }
        $team1Players = User::whereIn('id', explode(',', Team::where('id', $gameVideo->team1->id)->first(['player_ids'])->player_ids))->with(['userProfile'])->get();
        $team2Players = User::whereIn('id', explode(',', Team::where('id', $gameVideo->team2->id)->first(['player_ids'])->player_ids))->with(['userProfile'])->get();
        return view('Member.game_video', compact('title', 'gameVideo', 'team1Players', 'team2Players', 'isFavorite'));
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
        $favorite->item_type = 'Video';
        $favorite->save();
        return response()->json(['success' => true, 'message' => 'Video has been added to favorite.']);
    }

    public function removeFromFavorite(Request $request) {
        $request->validate([
            'item_id' => [
                'required',
                'numeric'
            ]
        ]);

        Favorite::where('item_id', $request->item_id)->where('user_id', auth()->user()->id)->where('item_type', 'Video')->delete();

        return response()->json(['success' => true, 'message' => 'Video has been removed from favorite.']);
    }


    public function controlLikeCount(Request $request) {
        $request->validate([
            'game_video_id' => [
                'required',
                'numeric'
            ]
        ]);

        $gameVideoPreference = GameVideoPreference::where('game_video_id', $request->game_video_id)->where('user_id', auth()->user()->id)->where('preference_type', 'Like')->first();
        if ($gameVideoPreference) {
            $gameVideoPreference->delete();
            return response()->json(['success' => true, 'message' => 'LikedOptOut', 'data' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Like')->count()]);
        } else {
            $gameVideoDislikedPreference = GameVideoPreference::where('game_video_id', $request->game_video_id)->where('user_id', auth()->user()->id)->where('preference_type', 'Dislike')->first();
            if ($gameVideoDislikedPreference) {
                $gameVideoDislikedPreference->delete();
            }
            $gameVideoPreference = new GameVideoPreference();
            $gameVideoPreference->game_video_id = $request->game_video_id;
            $gameVideoPreference->user_id = auth()->user()->id;
            $gameVideoPreference->preference_type = 'Like';
            $gameVideoPreference->save();
            return response()->json([
                'success' => true,
                'message' => 'LikedOptIn',
                'data' => [
                    'like_count' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Like')->count(),
                    'dislike_count' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Dislike')->count(),
                ]
            ]);
        }

    }

    public function controlDislikeCount(Request $request) {
        $request->validate([
            'game_video_id' => [
                'required',
                'numeric'
            ]
        ]);

        $gameVideoPreference = GameVideoPreference::where('game_video_id', $request->game_video_id)->where('user_id', auth()->user()->id)->where('preference_type', 'Dislike')->first();
        if ($gameVideoPreference) {
            $gameVideoPreference->delete();
            return response()->json(['success' => true, 'message' => 'DislikedOptOut', 'data' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Dislike')->count()]);
        } else {
            $gameVideoLikedPreference = GameVideoPreference::where('game_video_id', $request->game_video_id)->where('user_id', auth()->user()->id)->where('preference_type', 'Like')->first();
            if ($gameVideoLikedPreference) {
                $gameVideoLikedPreference->delete();
            }
            $gameVideoPreference = new GameVideoPreference();
            $gameVideoPreference->game_video_id = $request->game_video_id;
            $gameVideoPreference->user_id = auth()->user()->id;
            $gameVideoPreference->preference_type = 'Dislike';
            $gameVideoPreference->save();
            return response()->json([
                'success' => true,
                'message' => 'DislikedOptIn',
                'data' => [
                    'like_count' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Like')->count(),
                    'dislike_count' => GameVideoPreference::where('game_video_id', $request->game_video_id)->where('preference_type', 'Dislike')->count(),
                ]
            ]);
        }
    }


}
