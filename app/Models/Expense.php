<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'concept',
        'date',
        'provider_nif',
        'expense',
        'iva',
        'paid'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->calculateTotals();
        });
    }

    public function calculateTotals()
    {
        if ($this->iva) {
            $this->total_iva = $this->expense * ($this->iva / 100);
            $this->total_invoice = $this->expense + $this->total_iva;
        } else {
            $this->total_iva = 0;
            $this->total_invoice = $this->expense;
        }
    }
}
