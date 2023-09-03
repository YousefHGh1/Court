<?php

namespace App\Http\Controllers;

use App\Models\Volanteer;
use App\Models\Volanteer1;
use Illuminate\Http\Request;

class VolanteerController extends Controller
{

    public function index()
    {
        //
        $volanteer = Volanteer::all();

        return view('employee_type.volanteer.index', compact('volanteer'));
    }


    public function create()
    {
        //
        return view('employee_type.volanteer.create');
    }


    public function store(Request $request)
    {
        //
        try {
            $volanteer = new Volanteer();
            $volanteer->id_volanteer = $request->input('id_volanteer');
            $volanteer->volanteer_email = $request->input('volanteer_email');
            $volanteer->volanteer_name = $request->input('volanteer_name');
            $volanteer->volanteer_gender = $request->input('volanteer_gender');
            $volanteer->volanteer_status = $request->input('volanteer_status');
            $volanteer->volanteer_address = $request->input('volanteer_address');
            $volanteer->volanteer_mobile = $request->input('volanteer_mobile');
            $volanteer->volanteer_birthdate = $request->input('volanteer_birthdate');
            $volanteer->volanteer_degree = $request->input('volanteer_degree');
            $volanteer->volanteer_major = $request->input('volanteer_major');
            $volanteer->volanteer_graduation = $request->input('volanteer_graduation');
            $volanteer->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي!!!.');
        }

        try {
            $volanteer1 = new Volanteer1();
            $volanteer1->volanteer_id = $volanteer->id;
            $volanteer1->volanteer_type = $request->input('volanteer_type');
            $volanteer1->volanteer_duration = $request->input('volanteer_duration');

            $volanteer1->circle = $request->input('circle');
            $volanteer1->section = $request->input('section');
            $volanteer1->division = $request->input('division');
            $volanteer1->named = $request->input('named');
            $volanteer1->volanteer_start_date = $request->input('volanteer_start_date');
            $volanteer1->volanteer_end_date = $request->input('volanteer_end_date');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time().'.'.$file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filevolanteer'), $name);
                $volanteer1->file = $name;
            }
            $volanteer1->save();

            return redirect()->route('volanteer.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة البيانات الأساسية للموظف!!!.');
        }
    }


    public function show($id)
    {
        //
        $volanteer = Volanteer::find($id);
        $volanteer1 = Volanteer1::find($id);

        return view('employee_type.volanteer.show', compact('volanteer', 'volanteer1'));
    }


    public function edit($id)
    {
        //
        $volanteer1 =Volanteer1::find($id);
        $volanteer =Volanteer::find($id);
        return view('employee_type.volanteer.edit',compact('volanteer','volanteer1'));
    }

    public function update(Request $request, $id)
    {
        //
        $volanteer_birthdate = date('Y-m-d ', strtotime($request->input('contract_birthdate')));

        try {
            $volanteer =Volanteer::findOrFail($id);
            $volanteer->id_volanteer = $request->input('id_volanteer');
            $volanteer->volanteer_email = $request->input('volanteer_email');
            $volanteer->volanteer_name = $request->input('volanteer_name');
            $volanteer->volanteer_gender = $request->input('volanteer_gender');
            $volanteer->volanteer_status = $request->input('volanteer_status');
            $volanteer->volanteer_address = $request->input('volanteer_address');
            $volanteer->volanteer_mobile = $request->input('volanteer_mobile');
            $volanteer->volanteer_birthdate = $volanteer_birthdate;
            $volanteer->volanteer_degree = $request->input('volanteer_degree');
            $volanteer->volanteer_major = $request->input('volanteer_major');
            $volanteer->volanteer_graduation = $request->input('volanteer_graduation');
            $volanteer->save();

        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي!!!.');
        }


        $volanteer_start_date = date('Y-m-d ', strtotime($request->input('start_date')));
        $volanteer_end_date = date('Y-m-d ', strtotime($request->input('end_date')));
        try {
            $volanteer1 =Volanteer1::findOrFail($id);
            $volanteer1->volanteer_id = $volanteer->id;
            $volanteer1->volanteer_type = $request->input('volanteer_type');
            $volanteer1->volanteer_duration = $request->input('volanteer_duration');

            $volanteer1->circle = $request->input('circle');
            $volanteer1->section = $request->input('section');
            $volanteer1->division = $request->input('division');
            $volanteer1->named = $request->input('named');
            $volanteer1->volanteer_start_date = $volanteer_start_date;
            $volanteer1->volanteer_end_date = $volanteer_end_date;

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time().'.'.$file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filevolanteer'), $name);
                $volanteer1->file = $name;
            }
            $volanteer1->save();

            return redirect()->route('volanteer.index')->with('info', 'تم حفظتعديل البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة البيانات الأساسية للموظف!!!.');
        }
    }


    public function destroy($id)
    {
        //
        try {
            // حذف بيانات الموظف
            $volanteer = Volanteer::find($id);
            $volanteer->delete();

            // حذف البيانات الأساسية للموظف
            $volanteer1 = Volanteer1::where('volanteer_id', $id)->firstOrFail();
            $volanteer1->delete();

    
            return redirect()->route('volanteer.index')->with('danger', 'تم حذف البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء الحذف يرجى المحاولة مرة أخرى.');
        }
    }
}