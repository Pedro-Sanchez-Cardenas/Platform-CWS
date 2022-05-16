<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cistern extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_waters_id',
        'capacity',
        'status'
    ];

    public function productWater()
    {
        return $this->belongsTo(ProductWater::class, 'id', 'product_waters_id');
    }
}
