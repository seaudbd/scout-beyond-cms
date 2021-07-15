<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    protected $guarded = [];

    public function item() {
        if ($this->where('item_type', 'Video')) {
            return $this->belongsTo(GameVideo::class, 'item_id', 'id');
        }

        if ($this->where('item_type', 'Player')) {
            return $this->belongsTo(User::class, 'item_id', 'id');
        }

    }
}
