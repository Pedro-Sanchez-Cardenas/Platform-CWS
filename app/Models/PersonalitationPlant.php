<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalitationPlant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'irrigation',
        'sdi',
        'chloride',
        'well_pump',
        'feed_pump',
        'boosterc',
        'feed_flow',
        'permeate_flow',
        'reject_flow'
    ];

    // Relations
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'id', 'plants_id');
    }
}
