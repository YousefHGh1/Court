<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_employee', 'employee_num', 'employee_name', 'employee_email',
        'employee_gender', 'employee_status', 'employee_address',
        'employee_mobile', 'employee_birthdate', 'employee_birthplace', 'vacation_days'
    ];

    public function NormalHolidays()
    {
        return $this->hasMany(NormalHoliday::class, 'employee_id', 'id');
    }

    public function SickHolidays()
    {
        return $this->hasMany(SickHoliday::class);
    }

    public function ExternalHolidays()
    {
        return $this->hasMany(ExternalHoliday::class);
    }

    public function EmergencyHolidays()
    {
        return $this->hasMany(EmergencyHoliday::class);
    }

    public function MaindataEmps()
    {
        return $this->hasMany(MaindataEmp::class);
    }

    public function SonsWivesEmps()
    {
        return $this->hasMany(SonsWivesEmp::class);
    }

    public function wifes()
    {
        return $this->hasMany(Wife::class);
    }

    public function sons()
    {
        return $this->hasMany(Son::class);
    }

    public function Educationals()
    {
        return $this->hasMany(Educational::class);
    }

    public function Edus()
    {
        return $this->hasMany(Edu::class);
    }

    public function Dependents()
    {
        return $this->hasMany(Dependent::class);
    }

    // نوع التعيين
    public function get_appointment_type()
    {
        return $this->MaindataEmps()->value('appointment_type');
    }

    // تاريخ التثبيت
    public function ministry_installation_date()
    {
        return $this->MaindataEmps()->value('ministry_installation_date');
    }

    // أيام الإجازة
    public function get_vacation_days()
    {
        $totalVacationDays = 0;
        foreach ($this->MaindataEmps as $maindataEmp) {
            $totalVacationDays += $maindataEmp->vacation_days;
        }
        return $totalVacationDays;
    }

    // // حساب العمر
    // public function getAge()
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $this->employee_birthdate)->diffInYears(Carbon::now());
    // }

    // // سنوات الخدمة
    // public function getServiceYears()
    // {
    // $installationDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->ministry_installation_date());
    // $now = Carbon::now();
    // $serviceYears = $now->diffInYears($installationDate);

    //     return $serviceYears;
    // }

    // حساب العمر
    public function getAge()
    {
        $birthdate = strtotime($this->employee_birthdate);
        $now = time();
        $diff = $now - $birthdate;
        $years = floor($diff / (365 * 24 * 60 * 60)); // تقسيم عدد الثواني على عدد الثواني في سنة

        return $years;
    }

    // سنوات الخدمة
    public function getServiceYears()
    {
        $installationDate = strtotime($this->ministry_installation_date());
        $now = time();
        $diff = $now - $installationDate;
        $years = floor($diff / (365 * 24 * 60 * 60)); 

        return $years;
    }


    // أيام الإجازة
    public function getVacationDays()
    {
        $age = $this->getAge();
        $serviceYears = $this->getServiceYears();

        if ($age > 50 && $serviceYears >= 15) {
            return 35;
        } else {
            return 30;
        }
    }
}
