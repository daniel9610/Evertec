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

    public function show($id)
    {
        $item = Item::where('id', $id)->with('picture')->get();
        return $item;
    }

    public function createItem()
    {

    }

}