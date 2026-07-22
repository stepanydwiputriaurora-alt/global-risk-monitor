<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'country_code',
        'country_name',
        'flag',
        'risk',
        'score'
    ];
}