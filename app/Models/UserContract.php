<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'contract_start',
        'contract_end',
        'pantry_vouchers',
        'gasoline_vouchers',
        'payment',
        'payment_types_id',
        'user_created_at',
        'user_updated_at',
        'user_deleted_at'
    ];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class, 'users_id', 'id');
    }

    public function PaymentType()
    {
        return $this->belongsTo(PaymentType::class, 'id', 'payment_types_id');
    }
}
