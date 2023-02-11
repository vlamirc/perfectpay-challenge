<?php

namespace App\Models;

class Item
{
    const ITEMS = [
        [
            'id' => 1,
            'description' => 'Produto 01',
            'value' => 100.00,
        ],
        [
            'id' => 2,
            'description' => 'Produto 02',
            'value' => 200.00,
        ],
        [
            'id' => 3,
            'description' => 'Produto 03',
            'value' => 300.00,
        ],
    ];

    public static function all()
    {
        return collect(self::ITEMS);
    }

    public static function find($id)
    {
        return collect(self::ITEMS)->firstWhere('id', $id);
    }
}
