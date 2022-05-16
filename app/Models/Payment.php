<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'pay_day',
        'catalog_conceps_id',
        'payment_status_id',
        'billing_periods_id',
        'providers_id',
        'invoice_path'
    ];

    public function CatalogConcep()
    {
        return $this->belongsToMany(CatalogConcep::class);
    }

    public function provider()
    {
        return $this->belongsToMany(provider::class);
    }
}
