<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',
        'calcium_chloride',
        'sodium_carbonate',
        'sodium_hypochlorite',
        'antiscalant',
        'sodium_hydroxide',
        'hydrochloric_acid',
        'kl1',
        'kl2'
    ];

    public function productWater()
    {
        return $this->belongsTo(ProductWater::class, 'id', 'product_waters_id');
    }
}
