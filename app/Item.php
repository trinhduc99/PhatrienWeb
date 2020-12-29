<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $guarded = [];

    public function motelRooms(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MotelRoom::class,'item_motel_room','motel_room_id','item_id');
    }
}
