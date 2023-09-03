<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Employee;
use Illuminate\Http\Request;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('employee_type.employee.dependent.index');
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
        return view('employee_type.employee.dependent.create', compact('employee'));
    }


    public function store(Request $request)
    {
        //

        try {
            $dependent = new Dependent();
            $dependent->employee_id = $request->input('employee_id');
            $dependent->dependent_name = $request->input('dependent_name');
            $dependent->id_dependent = $request->input('id_dependent');
            $dependent->dependent_birth = $request->input('dependent_birth');
            $dependent->dependent_gender = $request->input('dependent_gender');

            if ($request->hasFile('dependent_file')) {
                $dependent_file = $request->file('dependent_file');
                $name = time() . '.' . $dependent_file->getClientOriginalExtension();
                $dependent_file->move(public_path('dependent_file'), $name);
                $dependent->dependent_file = $name;
            }

            $dependent->relative_relation = $request->input('relative_relation');
            $dependent->dependent_address = $request->input('dependent_address');
            $dependent->notes = $request->input('notes');
            $dependent->save();

            return redirect()->route('employee.index')->with('success', 'تم حفظ بيانات المعالين');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات المعالين!!!.');
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
        // $educational = Educational::find($id);
        $dependent = Dependent::find($id);
        return view('employee_type.employee.dependent.edit', compact('employee', 'dependent'));
    }


    public function update(Request $request, $id)
    {
        //
        try {
            $dependent = Dependent::findOrFail($id);
            $dependent->employee_id = $request->input('employee_id');
            $dependent->dependent_name = $request->input('dependent_name');
            $dependent->id_dependent = $request->input('id_dependent');
            $dependent->dependent_birth = $request->input('dependent_birth');
            $dependent->dependent_gender = $request->input('dependent_gender');

            if ($request->hasFile('dependent_file')) {
                $dependent_file = $request->file('dependent_file');
                $name = time() . '.' . $dependent_file->getClientOriginalExtension();
                $dependent_file->move(public_path('dependent_file'), $name);
                $dependent->dependent_file = $name;
            }

            $dependent->relative_relation = $request->input('relative_relation');
            $dependent->dependent_address = $request->input('dependent_address');
            $dependent->notes = $request->input('notes');
            $dependent->save();

            return redirect()->route('employee.index')->with('info', 'تم تعديل بيانات المعالين بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة  بيانات المعالين!!!.');
        }
    }


    public function destroy($id)
    {
        //
    }
}