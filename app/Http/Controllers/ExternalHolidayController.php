<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ExternalHoliday;
use Illuminate\Http\Request;

class ExternalHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $holiday = ExternalHoliday::all();

        return view('holiday.external.index', compact('holiday'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employee =Employee::all();
        return view('holiday.external.create',compact('employee'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $holiday = new ExternalHoliday();
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
            $name = time().'.'.$file->getClientOriginalExtension();
            // $path = $name;
            $file->move(public_path('fileholiday'), $name);
            $holiday->file = $name;
        }

        $holiday->holiday_balance = $request->input('holiday_balance');
        $holiday->spent_balance = $request->input('spent_balance');
        $holiday->remaining_balance = $request->input('remaining_balance');
        $holiday->save();

        return redirect()->route('external.index')->with('success', 'تم حفظ البيانات بنجاح');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalHoliday  $externalHoliday
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalHoliday $externalHoliday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalHoliday  $externalHoliday
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $holiday = ExternalHoliday::find($id);
        return view('holiday.external.edit', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalHoliday  $externalHoliday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $start_date = date('Y-m-d ', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d ', strtotime($request->input('end_date')));
        
        $holiday = ExternalHoliday::findOrFail($id);
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
            $name = time().'.'.$file->getClientOriginalExtension();
            // $path = $name;
            $file->move(public_path('fileholiday'), $name);
            $holiday->file = $name;
        }

        $holiday->holiday_balance = $request->input('holiday_balance');
        $holiday->spent_balance = $request->input('spent_balance');
        $holiday->remaining_balance = $request->input('remaining_balance');
        $holiday->save();

        return redirect()->route('external.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalHoliday  $externalHoliday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $holiday = ExternalHoliday::find($id);

        $holiday->delete();
        return redirect()->back()->with('danger','تم حذف الاجازة بجاح');

    }
}