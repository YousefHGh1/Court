<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalHoliday extends Model
{
    use HasFactory;

    protected $fillable = [
        'holiday_reason', 'employee_id', 'employee_num',
        'holiday_place', 'holiday_address',
        'start_date', 'end_date', 'sub_employee',
        'note', 'file',  'vacation_days',
        'spent_balance', 'remaining_balance'
    ];


    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}