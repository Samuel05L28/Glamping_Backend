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

    public function cabins()
    {
        return $this->belongsTo(Cabin::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
