<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionReading extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',
        'trains_id',
        'reading',
        'type'
    ];

    public function train()
    {
        return $this->belongsTo(Train::class, 'trains_id', 'id');
    }

    public function productWater()
    {
        return $this->belongsTo(ProductWater::class, 'id', 'product_waters_id');
    }
}
