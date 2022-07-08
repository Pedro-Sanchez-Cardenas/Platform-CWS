<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'capacity',

        'boosters_quantity',
        'multimedia_filters_quantity',
        
        'tds',
        'status',
        'type',

        'polish_filters_types_id',
        'polish_filters_quantity',

        'membrane_types_id',
        'membrane_elements',

        'user_created_at',
        'user_updated_at'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plants_id', 'id');
    }

    public function polish_filters_type()
    {
        return $this->hasOne(PolishFiltersType::class, 'id', 'polish_filters_types_id');
    }

    public function membrane_type()
    {
        return $this->hasOne(MembraneType::class, 'id', 'membrane_types_id');
    }

    public function pretreatments()
    {
        return $this->hasMany(Pretreatment::class, 'trains_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class, 'trains_id', 'id')->orderBy('created_at', 'DESC');
    }
}
