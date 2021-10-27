<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoutes extends Model
{
    protected $fillable = [
        'busroute1', 'busroute2', 'description', 'date' , 'time', 'price'
    ];
    use HasFactory;
}
