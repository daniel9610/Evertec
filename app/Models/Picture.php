<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Picture extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->hasMany(Item::class);
    }

}
