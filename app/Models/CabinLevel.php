<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CabinLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
    ];


    public function cabins(): HasMany
    {
        return $this->hasMany(Cabin::class);
    }
}
