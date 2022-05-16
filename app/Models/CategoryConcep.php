<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryConcep extends Model

{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category',
        'user_created_at',
        'user_updated_at'
    ];

    public function pretreatment()
    {
        return $this->belongsTo(Pretreatment::class, 'id', 'pretreatments_id');
    }
}
