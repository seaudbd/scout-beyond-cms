<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\GameVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    public function loadFavorites() {
        $title = 'Favorites';
        return view('Member.favorites', compact('title'));
    }

    public function getFavoriteRecords() {
        return response()->json([
            'players' => User::where('type', 'Player')->whereIn('id', Favorite::where('user_id', auth()->user()->id)->where('item_type', 'Player')->get(['item_id']))->with(['userProfile'])->get(),
            'gameVideos' => GameVideo::whereIn('id', Favorite::where('user_id', auth()->user()->id)->where('item_type', 'Video')->get(['item_id']))->get()
        ]);
    }

    public function removeFromFavorite(Request $request) {
        $request->validate([
            'item_id' => [
                'required',
                'numeric'
            ],
            'item_type' => [
                'required',
                Rule::in(['Player', 'Video'])
            ]
        ]);

        Favorite::where('item_id', $request->item_id)->where('user_id', auth()->user()->id)->where('item_type', $request->item_type)->delete();

        return response()->json(['success' => true, 'message' => 'Item has been removed from favorite.']);
    }
}
