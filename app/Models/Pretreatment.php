<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretreatment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'trains_id',
        'group_by',

        'well_pump', // nullable
        'feed_pump', // nullable

        'frecuencies_well_pump', // nullable
        'frecuencies_feed_pump', // nullable

        'backwash',
        'observations',

        'user_created_at',
        'user_updated_at' // nullable
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plants_id', 'id');
    }

    public function train()
    {
        return $this->belongsTo(Train::class, 'trains_id', 'id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'user_created_at', 'id');
    }

    public function multimedias()
    {
        return $this->hasMany(MultimediaFilter::class, 'pretreatments_id', 'id');
    }

    public function polish()
    {
        return $this->hasMany(PolishFilter::class, 'pretreatments_id', 'id');
    }
}
