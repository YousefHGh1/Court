<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Summoner;
use App\Models\Defendant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CourtController extends Controller
{

    public function index()
    {
        // استعلام لاسترداد جميع البيانات المخزنة في الجداول المرتبطة (Court، Summoner، Defendant)
        $court = Court::all(); // استرداد جميع الصفوف في جدول Court
        $data = []; // مصفوفة لتخزين البيانات المستردة

        foreach ($court as $courts) {
            $courtData = [
                'court' => $courts,
                'summoners' => $courts->summoners, // استرداد جميع المدعين المرتبطين بالصفحة
                'defendants' => $courts->defendants, // استرداد جميع المستدعين ضدهم المرتبطين بالصفحة
            ];

            $data[] = $courtData;
        }

        // يمكنك تنفيذ أي عمليات أخرى هنا لتحضير البيانات حسب احتياجاتك

        return view('court.index', compact('data'));
    }

    //  عمل اخطار
    public function create()
    {
        return view('court.create');
    }

    // public function store1(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'jibaya_id' => 'required|numeric',
    //         'summoner.*.idno_summoner' => 'required|numeric',
    //         'summoner.*.summoner' => 'required',
    //         'defendant.*.idno_defendant' => 'required|numeric',
    //         'defendant.*.defendant' => 'required',
    //         'amount' => 'required|numeric',
    //         'address' => 'nullable|string',
    //     ]);

    //     // Convert the array of inputs to a string
    //     $summoners = [];
    //     foreach ($validatedData['summoner'] as $item) {
    //         $summoners[] = $item['summoner'].' ('.$item['idno_summoner'].')';
    //     }
    //     $summonersString = implode(', ', $summoners);

    //     $defendants = [];
    //     foreach ($validatedData['defendant'] as $item) {
    //         $defendants[] = $item['defendant'].' ('.$item['idno_defendant'].')';
    //     }
    //     $defendantsString = implode(', ', $defendants);

    //     // Store the data in the database
    //     $court = new Court();
    //     $court->jibaya_id = $validatedData['jibaya_id'];
    //     $court->summoner = $summonersString;
    //     $court->defendant = $defendantsString;
    //     $court->amount = $validatedData['amount'];
    //     $court->address = $validatedData['address'];
    //     $court->save();

    //     if ($court == true) {
    //         return redirect('court')->with('info', 'تمت الحفظ بنجاح!');
    //     } else {
    //         return redirect('court/create')->with('warning', '  تحقق من صحة البيانات!');
    //     }
    //     // ...
    // }



    public function store(Request $request)
    {
        // حفظ بيانات الصفحة في الجدول الرئيسي
        $court = new Court;
        $court->jibaya_id = $request->input('jibaya_id');
        $court->amount = $request->input('amount');
        $court->address = $request->input('address');
        $court->action_type = 'طلب تنفيذي';

        $court->save();

        // حفظ المدعين في الجدول الخاص بهم
        foreach ($request->input('summoner') as $summonerData) {
            $summoner = new Summoner;
            $summoner->court_id = $court->id;
            $summoner->idno_summoner = $summonerData['idno_summoner'];
            $summoner->summoner = $summonerData['summoner'];
            $summoner->save();
        }

        // حفظ المستدعى ضده في الجدول الخاص بهم
        foreach ($request->input('defendant') as $defendantData) {
            $defendant = new Defendant;
            $defendant->court_id = $court->id;
            $defendant->idno_defendant = $defendantData['idno_defendant'];
            $defendant->defendant = $defendantData['defendant'];
            $defendant->save();
        }

        // استدعاء البيانات الأخرى من وزارة الحكم المحلي في غزة
        // يمكنك كتابة الكود اللازم هنا لجلب البيانات المطلوبة

        return redirect()->route('court.index')->with('success', 'تم حفظ البيانات بنجاح');
    }

    // طلب تنفيذي
    public function court_order($id)
    {
        $court = Court::find($id);
        // if ($court->action_type = '--') {
        //     $court->action_type = 'تسوية - دفع كامل';
        //     $court->save();
        // }
        return view('court.court_order', compact('court'));
    }

    public function edit($id)
    {
        //
        $court = Court::find($id);

        return view('court.edit', compact('court'));
    }

    public function update(Request $request, $id)
    {
        // حفظ بيانات الصفحة في الجدول الرئيسي
        $court = Court::findOrFail($id);
        $court->jibaya_id = $request->input('jibaya_id');
        $court->amount = $request->input('amount');
        $court->address = $request->input('address');
        $court->action_type = $request->input('action_type');
        $court->case_num = $request->input('case_num');
        $court->save();

        // تحديث المدعين في الجدول الخاص بهم
        $existingSummoners = $court->summoners()->pluck('id')->toArray();
        foreach ($request->input('summoner') as $summonerData) {
            if (isset($summonerData['id']) && in_array($summonerData['id'], $existingSummoners)) {
                $summoner = Summoner::findOrFail($summonerData['id']);
                $summoner->idno_summoner = $summonerData['idno_summoner'];
                $summoner->summoner = $summonerData['summoner'];
                $summoner->save();
            }
        }

        // تحديث المستدعى ضده في الجدول الخاص بهم
        $existingDefendants = $court->defendants()->pluck('id')->toArray();
        foreach ($request->input('defendant') as $defendantData) {
            if (isset($defendantData['id']) && in_array($defendantData['id'], $existingDefendants)) {
                $defendant = Defendant::findOrFail($defendantData['id']);
                $defendant->idno_defendant = $defendantData['idno_defendant'];
                $defendant->defendant = $defendantData['defendant'];
                $defendant->save();
            }
        }

        // استدعاء البيانات الأخرى من وزارة الحكم المحلي في غزة
        // يمكنك كتابة الكود اللازم هنا لجلب البيانات المطلوبة

        return redirect()->route('court.index')->with('success', 'تم تعديل البيانات بنجاح');
    }


    public function destroy($id)
    {
        $court = Court::findOrfail($id);
        $court->delete();
        return redirect()->route('court.index')->with('danger', 'تم حذف البيانات بنجاح');
    }

    // قبل الحجز
    // 1 دفع كامل
    public function B_all_amount($id)
    {
        $court = Court::find($id);

        $court->action_type = 'تسوية - دفع كامل';
        $court->save();
        return view('court.before_reservation_order.all_amount', compact('court'));
    }

    // 2 قسط
    public function B_part_amount($id)
    {
        $court = Court::find($id);

        $court->action_type = 'تسوية - تقسيط';
        $court->save();
        return view('court.before_reservation_order.part_amount', compact('court'));
    }


    // أنواع الحجز
    // 1 منع سفر
    public function travel_ban($id)
    {
        $court = Court::find($id);
        $court->action_type = 'منع - منع سفر';
        $court->save();
        return view('court.reservation_order.travel_ban', compact('court'));
    }

    // 2 حجز راتب
    public function salary_reservation($id)
    {
        $court = Court::find($id);
        $court->action_type = 'منع - حجر راتب';
        $court->save();
        return view('court.reservation_order.salary_reservation', compact('court'));
    }

    // 3 أمر حبس
    public function detention_order($id)
    {
        $court = Court::find($id);
        $court->action_type = 'منع - امر حبس';
        $court->save();
        return view('court.reservation_order.detention_order', compact('court'));
    }

    // بعد الحجز
    // 1 دفع كامل
    public function A_all_amount($id)
    {
        $court = Court::find($id);
        $court->action_type = 'فك حجز راتب - دفع كامل';
        $court->save();
        return view('court.after_reservation_order.all_amount', compact('court'));
    }
    // 2 قسط

    public function A_part_amount($id)
    {
        $court = Court::find($id);
        $court->action_type = 'فك حجز راتب - تقسيط';
        $court->save();
        return view('court.after_reservation_order.part_amount', compact('court'));
    }

    public function A_all_amount_travel($id)
    {
        $court = Court::find($id);
        $court->action_type = 'فك منع سفر - دفع كامل';
        $court->save();
        return view('court.after_reservation_order.all_amount_travel', compact('court'));
    }


    public function A_part_amount_travel($id)
    {
        $court = Court::find($id);
        $court->action_type = 'فك منع سفر - تقسيط';
        $court->save();
        return view('court.after_reservation_order.part_amount_travel', compact('court'));
    }

    // 3 فك أمر حبس
    public function end_detention($id)
    {
        $court = Court::find($id);
        $court->action_type = 'فك منع - أمر الحبس';
        $court->save();
        return view('court.after_reservation_order.end_detention', compact('court'));
    }

    public function getDefendantName($idno)
    {
        $response = Http::withHeaders([
            'x-sso-authorization' => '',
            'x-user-id' => '',
            'x-user-ip' => '',
            'x-user-agent' => ''
        ])->get('https://ws.gov.ps/citizen/id/' . $idno);

        if ($response->ok()) {
            $data = $response->json();

            // قم بتحليل الاستجابة واستخراج الاسم
            // يمكنك ضبط الكود حسب هيكل الاستجابة المتوقع

            return $data['name']; // استبدل 'name' بالمفتاح الصحيح للاسم في الاستجابة
        }

        return '';
    }
}
