<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];
    private static $statuses = [
        1 => 'Status 1',
        2 => 'Status 2',
        3 => 'Status 3',
        4 => 'Status 4'
    ];

    public static function getStatuses() {
        return self::$statuses;
    }
}
