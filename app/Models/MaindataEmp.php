<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaindataEmp extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id', 'appointment_type', 'named_ministry',
        'Work_start_date', 'Work_start_file',
        'ministry_date_appointment', 'ministry_file_appointment',
        'ministry_installation_date', 'ministry_installation_file',
        'circle', 'section', 'division', 'named',
        'salary', 'salary_status', 'vacation_days'
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}