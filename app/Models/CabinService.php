<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabinService extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabins_id',
        'services_id'
    ];
}
