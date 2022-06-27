<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_created_at',
        'user_updated_at'
    ];

    // Relations
    public function plants()
    {
        return $this->hasMany(Plant::class, 'plant_types_id', 'id');
    }
}
