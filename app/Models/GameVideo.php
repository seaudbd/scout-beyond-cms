<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVideo extends Model
{
    use HasFactory;

    protected $table = 'game_videos';
    protected $guarded = [];



    public function team1() {
        return $this->belongsTo(Team::class, 'team_id1');
    }

    public function team2() {
        return $this->belongsTo(Team::class, 'team_id2');
    }

    public function gameVideoPreferences() {
        return $this->hasMany(GameVideoPreference::class);
    }


}
