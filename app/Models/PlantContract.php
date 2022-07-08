<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantContract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'clients_id',
        'bot_m3',
        'bot_fixed',
        'oym_m3',
        'oym_fixed',
        'remineralitation',

        'years',
        'from',
        'till',
        'minimun_consumption',
        'billing_day',
        'payment_types_id',
        'observations',
        'user_created_at',
        'user_updated_at'
    ];
}
