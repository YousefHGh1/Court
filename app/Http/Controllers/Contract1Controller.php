<?php

namespace App\Http\Controllers;

use App\Models\Contract1;
use App\Models\Contract2;
use Illuminate\Http\Request;

class Contract1Controller extends Controller
{

    public function index()
    {
        //
        $contract1 = Contract1::all();
        return view('employee_type.contract.index', compact('contract1'));
    }


    public function create()
    {
        //
        return view('employee_type.contract.create');
    }


    public function store(Request $request)
    {
        //

        try {
            $contract1 = new Contract1();
            $contract1->id_contract = $request->input('id_contract');
            $contract1->contract_num = $request->input('contract_num');
            $contract1->contract_name = $request->input('contract_name');
            $contract1->contract_email = $request->input('contract_email');
            $contract1->contract_gender = $request->input('contract_gender');
            $contract1->contract_status = $request->input('contract_status');
            $contract1->contract_address = $request->input('contract_address');
            $contract1->contract_mobile = $request->input('contract_mobile');
            $contract1->contract_birthdate = $request->input('contract_birthdate');
            $contract1->contract_degree = $request->input('contract_degree');
            $contract1->contract_son = $request->input('contract_son');
            $contract1->contract_wife = $request->input('contract_wife');
            $contract1->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي!!!.');
        }



        try {
            $contract2 = new Contract2();
            $contract2->contract_id = $contract1->id;
            $contract2->contract_type = $request->input('contract_type');
            $contract2->contract_value = $request->input('contract_value');

            $contract2->contract_start_date = $request->input('contract_start_date');
            $contract2->contract_end_date = $request->input('contract_end_date');


            $contract2->operator = $request->input('operator');
            $contract2->workplace = $request->input('workplace');
            $contract2->circle = $request->input('circle');
            $contract2->section = $request->input('section');
            $contract2->division = $request->input('division');
            $contract2->named = $request->input('named');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filecontract'), $name);
                $contract2->file = $name;
            }
            $contract2->save();

            return redirect()->route('contract.index')->with('success', 'تم حفظ البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء حفظ البيانات. يرجى استكمال تعبئة البيانات الأساسية للموظف!!!.');
        }
    }


    public function show($id)
    {
        //
        $contract2 = Contract2::find($id);
        $contract1 = Contract1::find($id);

        return view('employee_type.contract.show', compact('contract2', 'contract1'));
    }


    public function edit($id)
    {
        //
        $contract2 = Contract2::find($id);
        $contract1 = Contract1::find($id);
        return view('employee_type.contract.edit', compact('contract2', 'contract1'));
    }


    public function update(Request $request, $id)
    {
        //

        $contract_birthdate = date('Y-m-d ', strtotime($request->input('contract_birthdate')));

        try {
            $contract1 = Contract1::findOrFail($id);
            $contract1->id_contract = $request->input('id_contract');
            $contract1->contract_num = $request->input('contract_num');
            $contract1->contract_name = $request->input('contract_name');
            $contract1->contract_email = $request->input('contract_email');
            $contract1->contract_gender = $request->input('contract_gender');
            $contract1->contract_status = $request->input('contract_status');
            $contract1->contract_address = $request->input('contract_address');
            $contract1->contract_mobile = $request->input('contract_mobile');
            $contract1->contract_birthdate = $contract_birthdate;
            $contract1->contract_degree = $request->input('contract_degree');
            $contract1->contract_son = $request->input('contract_son');
            $contract1->contract_wife = $request->input('contract_wife');
            $contract1->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة بيانات الملف الشخصي للموظف!!!.');
        }



        $contract_start_date = date('Y-m-d ', strtotime($request->input('start_date')));
        $contract_end_date = date('Y-m-d ', strtotime($request->input('end_date')));

        try {
            $contract2 = Contract2::findOrFail($id);
            $contract2->contract_id = $contract1->id;
            $contract2->contract_type = $request->input('contract_type');
            $contract2->contract_value = $request->input('contract_value');

            $contract2->contract_start_date = $contract_start_date;
            $contract2->contract_end_date = $contract_end_date;


            $contract2->operator = $request->input('operator');
            $contract2->workplace = $request->input('workplace');
            $contract2->circle = $request->input('circle');
            $contract2->section = $request->input('section');
            $contract2->division = $request->input('division');
            $contract2->named = $request->input('named');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = time() . '.' . $file->getClientOriginalExtension();
                // $path = $name;
                $file->move(public_path('filecontract'), $name);
                $contract2->file = $name;
            }
            $contract2->save();

            return redirect()->route('contract.index')->with('info', 'تم تعديل البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء تعديل البيانات. يرجى استكمال تعبئة البيانات الأساسية للموظف!!!.');
        }
    }


    public function destroy($id)
    {
        //
        try {
            // حذف بيانات الموظف
            $contract1 = Contract1::find($id);
            $contract1->delete();

            // حذف البيانات الأساسية للموظف
            $contract2 = Contract2::where('contract_id', $id)->firstOrFail();
            $contract2->delete();


            return redirect()->route('contract.index')->with('danger', 'تم حذف البيانات بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'حدث خطأ أثناء الحذف يرجى المحاولة مرة أخرى.');
        }
    }
}