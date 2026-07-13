<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name',
        'official_name',
        'code',
        'capital',
        'region',
        'subregion',
        'currency',
        'currency_symbol',
        'flag',
        'latitude',
        'longitude',
        'timezone',
    ];
}