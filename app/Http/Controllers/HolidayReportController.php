<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayReportController extends Controller
{
    //
    public function holiday_employee($id)
    {
        // في المكان الذي تريد فيه عرض إجازات الموظفين

        // استعراض إجازات الموظفين
        $employees = Employee::with('NormalHolidays')->get();

        return view('employee_type.employee.holiday_report', compact('employees'));
    }
}