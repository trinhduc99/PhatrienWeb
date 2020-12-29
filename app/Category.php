<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function motelRoomsCategory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MotelRoom::class, 'category_id');
    }
}
