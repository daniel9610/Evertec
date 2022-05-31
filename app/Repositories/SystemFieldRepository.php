<?php

namespace App\Repositories;

use App\Models\Fields;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function showFields($type)
    {
        $fields = Fields::where('type', $type)->get();
        return $fields;
    }

    public function createField()
    {

    }

}