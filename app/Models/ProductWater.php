<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWater extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',

        'ph',
        'hardness',
        'tds',
        'h2s',

        'free_chlorine',
        'chloride',

        'observations',
        'ope_mana_observation',

        'user_created_at',
        'user_updated_at'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plants_id', 'id');
    }

    public function assignedBy()
    {
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function cisterns()
    {
        return $this->hasMany(Cistern::class, 'product_waters_id', 'id');
    }

    public function chemical()
    {
        return $this->hasOne(Chemical::class, 'product_waters_id', 'id');
    }

    public function production_readings()
    {
        return $this->hasMany(ProductionReading::class, 'product_waters_id', 'id');
    }
}
