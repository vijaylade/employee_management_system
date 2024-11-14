<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_name',
        'joining_date',
        'designation',
        'status',
        'gender',
        'phone_number',
        'birth_date',
        'address',
        'aadhar_number',
        'pan_number',
        'account_number',
        'ifsc_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
