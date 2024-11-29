<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emp_id',
        'date',
        'in_time',
        'out_time',
        'total_availability',
        'break_time',
        'worked_hours',
        'work_report',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
