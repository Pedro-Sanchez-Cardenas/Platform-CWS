<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'cover_path', // nullable
        'installed_capacity',
        'design_limit',

        'polish_filter_types_id',
        'polish_filters_quantity',

        'multimedia_filters_quantity',
        'cisterns_quantity',

        'companies_id',
        'clients_id',
        'personalitation_plants_id',
        'countries_id',
        'plant_types_id',
        'operator', //nullable
        'manager', // nullable
        'user_created_at',
        'user_updated_at' // nullable
    ];

    // Relations
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'companies_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'clients_id');
    }

    public function Operator()
    {
        return $this->hasOne(User::class, 'id', 'operator');
    }

    public function Manager()
    {
        return $this->hasOne(User::class, 'id', 'manager');
    }

    public function user_created()
    {
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function user_updated()
    {
        return $this->hasOne(User::class, 'id', 'user_updated_at');
    }

    public function personalitation_plant()
    {
        return $this->hasOne(PersonalitationPlant::class, 'id', 'personalitation_plants_id');
    }

    public function plant_type()
    {
        return $this->hasOne(PlantType::class, 'id', 'plant_types_id');
    }

    public function trains()
    {
        return $this->hasMany(Train::class, 'plants_id', 'id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'countries_id');
    }

    public function contract()
    {
        return $this->belongsTo(PlantContract::class, 'plants_id', 'id');
    }

    public function pretreatments()
    {
        return $this->hasMany(Pretreatment::class, 'plants_id', 'id')->orderBy('id', 'DESC');
    }

    public function operations()
    {
        return $this->hasMany(Operation::class, 'plants_id', 'id')->orderBy('id', 'DESC');
    }

    public function product_waters()
    {
        return $this->hasMany(ProductWater::class, 'plants_id', 'id')->orderBy('id', 'DESC');
    }
}
