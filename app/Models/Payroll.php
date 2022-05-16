<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_contracts_id',
        'extra_payment',
        'confirmation'

    ];

    public function UserContract()
    {
        return $this->belongsTo(UserContract::class, 'id', 'users_id');
    }
}
