<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultimediaFilter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pretreatments_id',
        'trains_id',
        'in',
        'out'
    ];

    public function pretreatment()
    {
        return $this->belongsTo(Pretreatment::class, 'id', 'pretreatments_id');
    }
}
