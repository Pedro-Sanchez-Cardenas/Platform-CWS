<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'business_name',
        'rfc',
        'trn_number',
        'location',
        'zip',
        'suburb',
        'status',
        'countries_id',
        'services_id',
        'currencies_id'
    ];

    // Relations
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'countries_id');
    }

    public function plants()
    {
        return $this->hasMany(Plant::class, 'id', 'companies_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}
