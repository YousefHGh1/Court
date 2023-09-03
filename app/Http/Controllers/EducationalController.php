<?php

namespace App\Http\Controllers;

use App\Models\Educational;
use App\Models\Employee;
use Illuminate\Http\Request;

class EducationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('employee_type.employee.educational.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $employee = Employee::find($id);
        return view('employee_type.employee.educational.create', compact('employee'));
    }


    public function store(Request $request)
    {
        //

        try {
            $educational = new Educational();
            $educational->employee_id = $request->input('employee_id');
            $educational->educational_org = $request->input('educational_org');
            $educational->degree = $request->input('degree');
            $educational->majors = $request->input('majors');
            $educational->address_org = $request->input('address_org');
            $educational->graduation = $request->input('graduation');
            $educational->rate = $request->input('rate');
            $educational->rate_num = $request->input('rate_num');

            if ($request->hasFile('edu_file')) {
                $edu_file = $request->file('edu_file');
                $name = time() . '.' . $edu_file->getClientOriginalExtension();
                // $path = $name;
                $edu_file->move(public_path('edufile'), $name);
                $educational->edu_file = $name;
            }

            if ($request->hasFile('training_file')) {
                $training_file = $request->file('training_file');
                $name = time() . '.' . $training_file->getClientOriginalExtension();
                // $path = $name;
                $training_file->move(public_path('trainingfile'), $name);
                $educational->training_file = $name;
            }

            $educational->save();
            return redirect()->route('employee.index')->with('success', 'تم حفظ بيانات المؤهلات العلمية بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة بيانات المؤهلات العلمية!!!.');
        }
    }

    public function show(Educational $edu)
    {
        //
    }


    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $educational = Educational::find($id);
        return view('employee_type.employee.educational.edit', compact('employee', 'educational'));
    }



    public function update(Request $request, $id)
    {
        //
        try {
            $educational = Educational::findOrFail($id);;
            $educational->employee_id = $request->input('employee_id');
            $educational->educational_org = $request->input('educational_org');
            $educational->degree = $request->input('degree');
            $educational->majors = $request->input('majors');
            $educational->address_org = $request->input('address_org');
            $educational->graduation = $request->input('graduation');
            $educational->rate = $request->input('rate');
            $educational->rate_num = $request->input('rate_num');

            if ($request->hasFile('edu_file')) {
                $edu_file = $request->file('edu_file');
                $name = time() . '.' . $edu_file->getClientOriginalExtension();
                // $path = $name;
                $edu_file->move(public_path('edufile'), $name);
                $educational->edu_file = $name;
            }

            if ($request->hasFile('training_file')) {
                $training_file = $request->file('training_file');
                $name = time() . '.' . $training_file->getClientOriginalExtension();
                // $path = $name;
                $training_file->move(public_path('trainingfile'), $name);
                $educational->training_file = $name;
            }

            $educational->save();
            return redirect()->route('employee.index')->with('info', 'تم تعديل بيانات المؤهلات العلمية بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة بيانات المؤهلات العلمية!!!.');
        }
    }


    public function destroy(Educational $Educational)
    {
        //
    }
}