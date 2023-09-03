<?php

namespace App\Http\Controllers;

use App\Models\Contract1;
use App\Models\Contract2;
use App\Models\Court;
use App\Models\Daily;
use App\Models\Dependent;
use App\Models\Educational;
use App\Models\Employee;
use App\Models\MaindataEmp;
use App\Models\Son;
use App\Models\Volanteer;
use App\Models\Volanteer1;
use App\Models\Wife;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    public function welcome()
    {
        //
        $employee = Employee::all();
        $contract1 = Contract1::all();
        $daily = Daily::all();
        $volanteer = Volanteer::all();
        $volanteer1 = Volanteer1::all();
        $court = Court::all();

        return view('welcome', compact('employee', 'daily', 'contract1', 'volanteer', 'volanteer1', 'court'));
    }

    public function index()
    {
        //
        $employee = Employee::all();

        return view('employee_type.employee.index', compact('employee'));
    }

    public function create()
    {
        //
        return view('employee_type.employee.create');
    }

    public function store(Request $request)
    {
        try {

            $employee = new Employee();
            $employee->id_employee = $request->input('id_employee');
            $employee->employee_num = $request->input('employee_num');
            $employee->employee_name = $request->input('employee_name');
            $employee->employee_email = $request->input('employee_email');
            $employee->employee_gender = $request->input('employee_gender');
            $employee->employee_status = $request->input('employee_status');
            $employee->employee_address = $request->input('employee_address');
            $employee->employee_mobile = $request->input('employee_mobile');
            $employee->employee_birthdate = $request->input('employee_birthdate');
            $employee->employee_birthplace = $request->input('employee_birthplace');
            $employee->save();


            $maindataemp = new MaindataEmp();
            $maindataemp->employee_id = $employee->id;
            $maindataemp->appointment_type = $request->input('appointment_type');
            $maindataemp->named_ministry = $request->input('named_ministry');

            $maindataemp->Work_start_date = $request->input('Work_start_date');

            if ($request->hasFile('Work_start_file')) {
                $Work_start_file = $request->file('Work_start_file');
                $name = time() . '.' . $Work_start_file->getClientOriginalExtension();
                $Work_start_file->move(public_path('Work_start_files'), $name);
                $maindataemp->Work_start_file = $name;
            }

            $maindataemp->ministry_date_appointment = $request->input('ministry_date_appointment');

            if ($request->hasFile('ministry_file_appointment')) {
                $ministry_file_appointment = $request->file('ministry_file_appointment');
                $name = time() . '.' . $ministry_file_appointment->getClientOriginalExtension();
                $ministry_file_appointment->move(public_path('ministry_file_appointment'), $name);
                $maindataemp->ministry_file_appointment = $name;
            }

            $maindataemp->ministry_installation_date = $request->input('ministry_installation_date');

            if ($request->hasFile('ministry_installation_file')) {
                $ministry_installation_file = $request->file('ministry_installation_file');
                $name = time() . '.' . $ministry_installation_file->getClientOriginalExtension();
                $ministry_installation_file->move(public_path('ministry_installation_file'), $name);
                $maindataemp->ministry_installation_file = $name;
            }

            $maindataemp->circle = $request->input('circle');
            $maindataemp->section = $request->input('section');
            $maindataemp->division = $request->input('division');
            $maindataemp->named = $request->input('named');
            $maindataemp->salary = $request->input('salary');
            $maindataemp->salary_status = $request->input('salary_status');

            // تحويل التاريخ إلى تنسيق تاريخ معين (Y-m-d) للحسابات
            $ministryInstallationDate = date('Y-m-d', strtotime($maindataemp->ministry_installation_date));
            $today = date('Y-m-d');

            // حساب الفرق بين التاريخين بالأيام
            $diff = abs(strtotime($today) - strtotime($ministryInstallationDate));
            $yearsOfService = floor($diff / (60 * 60 * 24 * 365)); // عدد السنوات بالتقريب

            // تحويل تاريخ الميلاد إلى تنسيق تاريخ معين (Y-m-d) للحسابات
            $birthdate = date('Y-m-d', strtotime($employee->employee_birthdate));
            $today = date('Y-m-d');

            // حساب الفرق بين التاريخين بالأيام
            $diff = abs(strtotime($today) - strtotime($birthdate));
            $age = floor($diff / (60 * 60 * 24 * 365)); // العمر بالتقريب

            // تحديد عدد أيام الإجازة بناءً على الشروط المحددة
            if ($age >= 50 && $yearsOfService >= 15) {
                $vacationDays = 35;
            } else {
                $vacationDays = 30;
            }
            // حفظ عدد أيام الإجازة في قاعدة البيانات
            $maindataemp->vacation_days = $vacationDays;

            $maindataemp->save();

            $employee->vacation_days = $vacationDays;
            $employee->save();

            return redirect()->route('employee.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة البيانات  للموظف!!!.');
        }
    }

    public function show($id)
    {
        //
        $employee = Employee::findOrFail($id);
        $maindataemp = MaindataEmp::where('employee_id', $employee->id)->first();
        $wives = Wife::where('employee_id', $id)->get();
        $sons = Son::where('employee_id', $id)->get();
        $educationals = Educational::where('employee_id', $id)->get();
        $dependents = Dependent::where('employee_id', $id)->get();

        if (!empty($wives)) {
            $wife = $wives->first();
        } else {
            $wife = null;
        }

        if (!empty($sons)) {
            $son = $sons->first();
        } else {
            $son = null;
        }

        if (!empty($educationals)) {
            $educational = $educationals->first();
        } else {
            $educational = null;
        }

        if (!empty($dependents)) {
            $dependent = $dependents->first();
        } else {
            $dependent = null;
        }

        return view('employee_type.employee.show', compact('employee', 'maindataemp', 'wives', 'sons', 'educational', 'dependent'));
    }

    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $maindataemp = MaindataEmp::find($id);
        return view('employee_type.employee.edit', compact('employee', 'maindataemp'));
    }

    public function update(Request $request, $id)
    {

        $employee_birthdate = date('Y-m-d', strtotime($request->input('employee_birthdate')));

        try {
            $employee = Employee::findOrFail($id);
            $employee->id_employee = $request->input('id_employee');
            $employee->employee_num = $request->input('employee_num');
            $employee->employee_name = $request->input('employee_name');
            $employee->employee_email = $request->input('employee_email');
            $employee->employee_gender = $request->input('employee_gender');
            $employee->employee_status = $request->input('employee_status');
            $employee->employee_address = $request->input('employee_address');
            $employee->employee_mobile = $request->input('employee_mobile');
            $employee->employee_birthdate = $employee_birthdate;
            $employee->employee_birthplace = $request->input('employee_birthplace');
            $employee->save();



            $Work_start_date = date('Y-m-d ', strtotime($request->input('Work_start_date')));
            $ministry_date_appointment = date('Y-m-d ', strtotime($request->input('ministry_date_appointment')));
            $ministry_installation_date = date('Y-m-d ', strtotime($request->input('ministry_installation_date')));

            $maindataemp = MaindataEmp::findOrFail($id);
            $maindataemp->employee_id = $employee->id;
            $maindataemp->appointment_type = $request->input('appointment_type');
            $maindataemp->named_ministry = $request->input('named_ministry');

            $maindataemp->Work_start_date = $Work_start_date;

            if ($request->hasFile('Work_start_file')) {
                $Work_start_file = $request->file('Work_start_file');
                $name = time() . '.' . $Work_start_file->getClientOriginalExtension();
                $Work_start_file->move(public_path('Work_start_files'), $name);
                $maindataemp->Work_start_file = $name;
            }

            $maindataemp->ministry_date_appointment = $ministry_date_appointment;

            if ($request->hasFile('ministry_file_appointment')) {
                $ministry_file_appointment = $request->file('ministry_file_appointment');
                $name = time() . '.' . $ministry_file_appointment->getClientOriginalExtension();
                $ministry_file_appointment->move(public_path('ministry_file_appointment'), $name);
                $maindataemp->ministry_file_appointment = $name;
            }

            $maindataemp->ministry_installation_date = $ministry_installation_date;

            if ($request->hasFile('ministry_installation_file')) {
                $ministry_installation_file = $request->file('ministry_installation_file');
                $name = time() . '.' . $ministry_installation_file->getClientOriginalExtension();
                $ministry_installation_file->move(public_path('ministry_installation_file'), $name);
                $maindataemp->ministry_installation_file = $name;
            }

            $maindataemp->circle = $request->input('circle');
            $maindataemp->section = $request->input('section');
            $maindataemp->division = $request->input('division');
            $maindataemp->named = $request->input('named');
            $maindataemp->salary = $request->input('salary');
            $maindataemp->salary_status = $request->input('salary_status');

            // تحويل التاريخ إلى تنسيق تاريخ معين (Y-m-d) للحسابات
            $ministryInstallationDate = date('Y-m-d', strtotime($maindataemp->ministry_installation_date));
            $today = date('Y-m-d');

            // حساب الفرق بين التاريخين بالأيام
            $diff = abs(strtotime($today) - strtotime($ministryInstallationDate));
            $yearsOfService = floor($diff / (60 * 60 * 24 * 365)); // عدد السنوات بالتقريب

            // تحويل تاريخ الميلاد إلى تنسيق تاريخ معين (Y-m-d) للحسابات
            $birthdate = date('Y-m-d', strtotime($employee->employee_birthdate));
            $today = date('Y-m-d');

            // حساب الفرق بين التاريخين بالأيام
            $diff = abs(strtotime($today) - strtotime($birthdate));
            $age = floor($diff / (60 * 60 * 24 * 365)); // العمر بالتقريب

            // تحديد عدد أيام الإجازة بناءً على الشروط المحددة
            if ($age >= 50 && $yearsOfService >= 15) {
                $vacationDays = 35;
            } else {
                $vacationDays = 30;
            }
            // حفظ عدد أيام الإجازة في قاعدة البيانات
            $maindataemp->vacation_days = $vacationDays;

            $maindataemp->save();

            $employee->vacation_days = $vacationDays;
            $employee->save();

            return redirect()->route('employee.index')->with('info', 'تم  تعديل البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة البيانات الأساسية للموظف!!!.');
        }
    }

    public function destroy($id)
    {
        try {
            // حذف بيانات الموظف
            $employee = Employee::find($id);
            $employee->delete();

            // حذف البيانات الأساسية للموظف
            $maindataemp = MaindataEmp::where('employee_id', $id)->firstOrFail();
            $maindataemp->delete();

            // حذف بيانات الزوجة
            $wife = Wife::where('employee_id', $id)->firstOrFail();
            $wife->delete();

            // حذف بيانات الأبناء
            $son = Son::where('employee_id', $id)->firstOrFail();
            $son->delete();

            // حذف البيانات التعليمية
            $educational = Educational::where('employee_id', $id)->firstOrFail();
            $educational->delete();

            // حذف بيانات المعالين
            $dependent = Dependent::where('employee_id', $id)->firstOrFail();
            $dependent->delete();

            return redirect()->route('employee.index')->with('danger', 'تم حذف البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء الحذف يرجى المحاولة مرة أخرى');
        }
    }
}