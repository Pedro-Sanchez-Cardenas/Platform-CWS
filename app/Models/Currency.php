<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'abbreviation',
        'value',
        'main_currency'
    ];

    // Relations
    public function country()
    {
        return $this->hasOne(Country::class, 'currency_id', 'id');
    }
}
