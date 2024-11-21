<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabins_id',
        'users_id',
    ];

    public function cabin()
    {
        return $this->belongsTo(Cabin::class, 'cabins_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
