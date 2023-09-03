<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Son;
use Illuminate\Http\Request;

class SonController extends Controller
{

    public function index()
    {
        //
        return view('employee_type.employee.son.create');
    }

    public function create($id)
    {
        //
        $employee = Employee::find($id);
        return view('employee_type.employee.son.create', compact('employee'));
    }

    public function store(Request $request)

    {
        try {
            $son = new Son();
            $son->employee_id = $request->input('employee_id');
            $son->id_son = $request->input('id_son');
            $son->son_name = $request->input('son_name');
            $son->son_satuts = $request->input('son_satuts');
            $son->son_gender = $request->input('son_gender');
            $son->son_birth = $request->input('son_birth');
            $son->son_job = $request->input('son_job');
            $son->son_unv = $request->input('son_unv');

            if ($request->hasFile('son_file')) {
                $son_file = $request->file('son_file');
                $name = time() . '.' . $son_file->getClientOriginalExtension();
                // $path = $name;
                $son_file->move(public_path('sonfile'), $name);
                $son->son_file = $name;
            }

            $son->son_unv_name = $request->input('son_unv_name');
            $son->son_major = $request->input('son_major');
            $son->son_study_start = $request->input('son_study_start');


            if ($request->hasFile('son_unv_file')) {
                $son_unv_file = $request->file('son_unv_file');
                $name = time() . '.' . $son_unv_file->getClientOriginalExtension();
                // $path = $name;
                $son_unv_file->move(public_path('sonunvfile'), $name);
                $son->son_unv_file = $name;
            }

            $son->save();
            return redirect()->route('employee.index')->with('success', 'تم حفظ بيانات الأبناء بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات الأبناء!!!.');
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
        $son = Son::find($id);
        return view('employee_type.employee.son.edit', compact('employee', 'son'));
    }


    public function update(Request $request, $id)
    {
        //
        try {
            $son = Son::findOrFail($id);
            $son->employee_id = $request->input('employee_id');
            $son->id_son = $request->input('id_son');
            $son->son_name = $request->input('son_name');
            $son->son_satuts = $request->input('son_satuts');
            $son->son_gender = $request->input('son_gender');
            $son->son_birth = $request->input('son_birth');
            $son->son_job = $request->input('son_job');
            $son->son_unv = $request->input('son_unv');

            if ($request->hasFile('son_file')) {
                $son_file = $request->file('son_file');
                $name = time() . '.' . $son_file->getClientOriginalExtension();
                // $path = $name;
                $son_file->move(public_path('sonfile'), $name);
                $son->son_file = $name;
            }

            $son->son_unv_name = $request->input('son_unv_name');
            $son->son_major = $request->input('son_major');
            $son->son_study_start = $request->input('son_study_start');


            if ($request->hasFile('son_unv_file')) {
                $son_unv_file = $request->file('son_unv_file');
                $name = time() . '.' . $son_unv_file->getClientOriginalExtension();
                // $path = $name;
                $son_unv_file->move(public_path('sonunvfile'), $name);
                $son->son_unv_file = $name;
            }

            $son->save();

            return redirect()->route('employee.index')->with('info', 'تم تعديل بيانات الأبناء بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات الأبناء!!!.');
        }
    }


    public function destroy($id)
    {
        //
    }
}