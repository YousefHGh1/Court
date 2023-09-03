<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use App\Models\Daily1;
use Illuminate\Http\Request;

class DailyController extends Controller
{

    public function index()
    {
        //
        $daily = Daily::all();
        return view('employee_type.daily.index', compact('daily'));
    }


    public function create()
    {
        //
        return view('employee_type.daily.create');
    }


    public function store(Request $request)
    {
        //
        try {
            $daily = new Daily();
            $daily->id_daily = $request->input('id_daily');
            $daily->daily_name = $request->input('daily_name');
            $daily->daily_gender = $request->input('daily_gender');
            $daily->daily_status = $request->input('daily_status');
            $daily->daily_address = $request->input('daily_address');
            $daily->daily_mobile = $request->input('daily_mobile');
            $daily->daily_birthdate = $request->input('daily_birthdate');
            $daily->daily_degree = $request->input('daily_degree');
            $daily->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي!!!.');
        }


        try {
            $daily1 = new Daily1();
            $daily1->daily_id = $daily->id;
            $daily1->daily_fare = $request->input('daily_fare');
            $daily1->monthly_fare = $request->input('monthly_fare');
            $daily1->work_start_date = $request->input('work_start_date');
            $daily1->work_end_date = $request->input('work_end_date');

            $daily1->circle = $request->input('circle');
            $daily1->section = $request->input('section');
            $daily1->division = $request->input('division');
            $daily1->named = $request->input('named');
            $daily1->kara = $request->input('kara');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filedaily'), $name);
                $daily1->file = $name;
            }
            $daily1->save();

            return redirect()->route('daily.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة البيانات العمل اليومي!!!.');
        }
    }


    public function show($id)
    {
        //
        $daily = Daily::find($id);
        $daily1 = Daily1::find($id);

        return view('employee_type.daily.show', compact('daily', 'daily1'));
    }


    public function edit($id)
    {
        //
        $daily1 = Daily1::find($id);
        $daily = Daily::find($id);

        return view('employee_type.daily.edit', compact('daily1', 'daily'));
    }

    public function update(Request $request, $id)
    {
        //
        $daily_birthdate = date('Y-m-d ', strtotime($request->input('daily_birthdate')));

        try {
            $daily = Daily::findOrFail($id);
            $daily->id_daily = $request->input('id_daily');
            $daily->daily_name = $request->input('daily_name');
            $daily->daily_gender = $request->input('daily_gender');
            $daily->daily_status = $request->input('daily_status');
            $daily->daily_address = $request->input('daily_address');
            $daily->daily_mobile = $request->input('daily_mobile');
            $daily->daily_birthdate = $daily_birthdate;
            $daily->daily_degree = $request->input('daily_degree');
            $daily->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي!!!.');
        }


        $work_start_date = date('Y-m-d ', strtotime($request->input('work_start_date')));
        $work_end_date = date('Y-m-d ', strtotime($request->input('work_end_date')));

        try {
            $daily1 = Daily1::findOrFail($id);
            $daily1->daily_id = $daily->id;
            $daily1->daily_fare = $request->input('daily_fare');
            $daily1->monthly_fare = $request->input('monthly_fare');
            $daily1->work_start_date = $work_start_date;
            $daily1->work_end_date = $work_end_date;

            $daily1->circle = $request->input('circle');
            $daily1->section = $request->input('section');
            $daily1->division = $request->input('division');
            $daily1->named = $request->input('named');
            $daily1->kara = $request->input('kara');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filedaily'), $name);
                $daily1->file = $name;
            }
            $daily1->save();

            return redirect()->route('daily.index')->with('info', 'تم تعديل البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة البيانات العمل اليومي!!!.');
        }
    }


    public function destroy($id)
    {
        try {
            $daily = Daily::find($id);
            $daily->delete();

            // حذف البيانات الأساسية للموظف
            $daily1 = Daily1::where('daily_id', $id)->firstOrFail();
            $daily1->delete();


            return redirect()->route('daily.index')->with('danger', 'تم حذف البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء الحذف يرجى المحاولة مرة أخرى.');
        }
    }
}