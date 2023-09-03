<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MaindataEmp;
use App\Models\NormalHoliday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NormalHolidayController extends Controller
{
    public function index()
    {
        //
        $holiday = NormalHoliday::all();

        return view('holiday.normal.index', compact('holiday'));
    }

    public function create()
    {
        $employee = Employee::all();
        return view('holiday.normal.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'holiday_reason' => 'required',
            'employee_id' => 'required|exists:employees,id',
            'holiday_place' => 'required',
            'holiday_address' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'sub_employee' => 'required|exists:employees,id',
            'note' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $holiday = new NormalHoliday();
        $holiday->holiday_reason = $request->input('holiday_reason');
        $holiday->employee_id = $request->input('employee_id');
        $holiday->employee_num = $request->input('employee_num');
        $holiday->holiday_place = $request->input('holiday_place');
        $holiday->holiday_address = $request->input('holiday_address');
        $holiday->start_date = $request->input('start_date');
        $holiday->end_date = $request->input('end_date');
        $holiday->sub_employee = $request->input('sub_employee');
        $holiday->note = $request->input('note');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . '.' . $file->getClientOriginalExtension();
            // $path = $name;
            $file->move(public_path('fileholiday'), $name);
            $holiday->file = $name;
        }

        $holiday->vacation_days = $request->input('vacation_days');
        $holiday->spent_balance = $request->input('spent_balance');
        $holiday->remaining_balance = $request->input('remaining_balance');
        $holiday->save();

        // After saving the holiday record, update the employee's holiday balance.
        $employee = Employee::findOrFail($request->input('employee_id'));
        $employee->vacation_days = $request->input('remaining_balance');
        $employee->save();

        return redirect()->route('normal.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    public function show(NormalHoliday $holiday)
    {
        //
    }

    public function edit($id)
    {
        //
        $holiday = NormalHoliday::find($id);
        return view('holiday.normal.edit', compact('holiday'));
    }

    public function update(Request $request, $id)
    {

        $start_date = date('Y-m-d ', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d ', strtotime($request->input('end_date')));


        $holiday = NormalHoliday::findOrFail($id);
        $holiday->holiday_reason = $request->input('holiday_reason');
        $holiday->employee_id = $request->input('employee_id');
        $holiday->employee_num = $request->input('employee_num');
        $holiday->holiday_place = $request->input('holiday_place');
        $holiday->holiday_address = $request->input('holiday_address');
        $holiday->start_date = $start_date;
        $holiday->end_date = $end_date;
        $holiday->sub_employee = $request->input('sub_employee');
        $holiday->note = $request->input('note');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fileholiday'), $name);
            $holiday->file = $name;
        }

        $holiday->vacation_days = $request->input('vacation_days');
        $holiday->spent_balance = $request->input('spent_balance');
        $holiday->remaining_balance = $request->input('remaining_balance');
        $holiday->save();

        return redirect()->route('normal.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function destroy($id)
    {
        //
        $holiday = NormalHoliday::find($id);
        $holiday->delete();
        return redirect()->back()->with('danger', 'تم حذف الاجازة بجاح');
    }
}
