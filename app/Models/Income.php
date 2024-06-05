<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    // campos rellenables desde el formulario (se excluyen los calculados)
    protected $fillable = [
        'intermediary_id',
        'apartment_id',
        'rate_id',
        'check_in',
        'check_out',
        'client_name',
        'client_nif',
        'client_phone',
        'number_of_people',
        'discount',
        'observations'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_iva' => 'float',
        'total_invoice' => 'float',
    ];

    // Relaciones
    public function intermediary()
    {
        return $this->belongsTo(Intermediary::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
