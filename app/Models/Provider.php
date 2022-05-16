<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }

    public function ProviderContact()
    {
        return $this->belongsToMany(ProviderContact::class);
    }

    public function ProviderType()
    {
        return $this->belongsTo(ProviderType::class, 'id', 'users_id');
    }
}
