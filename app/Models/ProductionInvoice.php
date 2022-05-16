<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionInvoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'invoice_start',
        'invoice_end',
        'plant_contracts_id',
        'discount',
        'production_trains',
        'production_irrigation',
        'production_municipal',
        'vat',
        'total',
        'status',
        'user_created_at',
        'user_updated_at'
    ];
}
