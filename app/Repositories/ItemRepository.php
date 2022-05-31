<?php

namespace App\Repositories;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemRepository
{
    public function getItems()
    {
        $items = Item::all();
        return $items;
    }

    public function createItem()
    {

    }

}