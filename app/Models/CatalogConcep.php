<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogConcep extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concep',
        'category_conceps_id'
    ];

    public function Payment()
    {
        return $this->belongsToMany(Payment::class);
    }
}
