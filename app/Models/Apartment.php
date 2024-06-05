<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'country'
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
