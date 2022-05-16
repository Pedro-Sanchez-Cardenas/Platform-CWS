<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBank extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'swift',
        'aba',
        'transit_number',
        'branch',
        'account_number',
        'key_account',
        'intermediary_banks_id',
        'user_created_at',
        'user_updated_at',
        'countries_id'
    ];
}
