<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'name',
        'price_per_night',
        'iva'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
