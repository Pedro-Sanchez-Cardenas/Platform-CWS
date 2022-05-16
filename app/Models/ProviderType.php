<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderType extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'names',
        'phones',
        'email',
        'user_created_at',
        'user_updated_at'
    ];

    public function providers()
    {
        return $this->hasMany(privider::class, 'providers_id', 'id');
    }
}
