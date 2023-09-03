<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Wife;
use Illuminate\Http\Request;

class WifeController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {
        //
        $employee = Employee::find($id);
        return view('employee_type.employee.wife.create', compact('employee'));
    }


    public function store(Request $request)
    {
        try {
            $wife = new Wife();
            $wife->employee_id = $request->input('employee_id');
            $wife->id_wife = $request->input('id_wife');
            $wife->wife_name = $request->input('wife_name');
            $wife->wife_birth = $request->input('wife_birth');
            $wife->date_marriage = $request->input('date_marriage');
            $wife->wife_job = $request->input('wife_job');

            if ($request->hasFile('wife_file')) {
                $wife_file = $request->file('wife_file');
                $name = time() . '.' . $wife_file->getClientOriginalExtension();
                // $path = $name;
                $wife_file->move(public_path('wifefile'), $name);
                $wife->wife_file = $name;
            }


            $wife->save();
            return redirect()->route('employee.index')->with('success', 'تم حفظ بيانات الزوج/ة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات الزوج/ة!!!.');
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $wife = Wife::find($id);
        // $son = Son::find($id);
        // $educational = Educational::find($id);
        // $dependent = Dependent::find($id);
        return view('employee_type.employee.wife.edit', compact('employee', 'wife'));
    }

    public function update(Request $request, $id)
    {

        try {
            $wife = Wife::findOrFail($id);
            $wife->employee_id = $request->input('employee_id');
            $wife->id_wife = $request->input('id_wife');
            $wife->wife_name = $request->input('wife_name');
            $wife->wife_birth = $request->input('wife_birth');
            $wife->date_marriage = $request->input('date_marriage');
            $wife->wife_job = $request->input('wife_job');

            if ($request->hasFile('wife_file')) {
                $wife_file = $request->file('wife_file');
                $name = time() . '.' . $wife_file->getClientOriginalExtension();
                // $path = $name;
                $wife_file->move(public_path('wifefile'), $name);
                $wife->wife_file = $name;
            }


            $wife->save();
            return redirect()->route('employee.index')->with('info', 'تم تعديل بيانات الزوج/ة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات الزوج/ة!!!.');
        }
    }


    public function destroy($id)
    {
        //
    }
}