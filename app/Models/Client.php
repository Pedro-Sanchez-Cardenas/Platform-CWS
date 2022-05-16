<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name',
        'short_name',
        'tax_id',
        'location',
        'client_contracts_id',
        'countries_id',
        'companies_id',
        'services_id',
        'data_banks_id',
        'user_created_at',
        'user_updated_at'
    ];
}
