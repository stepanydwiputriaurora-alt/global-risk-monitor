<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'product_name',
        'origin_country',
        'destination_country',
        'origin_port',
        'destination_port',
        'current_country',
        'current_port',
        'container_number',
        'status',
        'estimated_arrival',
        'actual_arrival',
    ];
}