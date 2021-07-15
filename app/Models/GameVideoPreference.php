<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVideoPreference extends Model
{
    use HasFactory;

    protected $table = 'game_video_preferences';
    protected $guarded = [];
}
