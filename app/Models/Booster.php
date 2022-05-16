<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booster extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'operations_id',
        'trains_id',
        'amperage',
        'frequency',
        'px',
        'booster_flow',
        'booster_pressures',
        'booster_pressures_total'
    ];

    // Relations
    public function operation()
    {
        return $this->belongsTo(Operation::class, 'id', 'operations_id');
    }
}
