<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeagueTableController extends Controller
{
    //

    public function getLeagueTable()
    {
        $response = Http::get('http://eservices.mtit.gov.ps/ws/gov-services/ws/getData'); // استبدل هذا الرابط برابط API الفعلي الذي يعيد جدول الترتيب
        
        if ($response->successful()) {
            $table = $response->json();
            return response()->json($table); // تعديل الاستجابة وفقًا لمتطلباتك
        } else {
            return response()->json(['error' => 'Failed to retrieve league table'], 500); // يمكنك تعديل رسالة الخطأ حسب الحالة
        }
    }

    public function show()
    {
        $client = new Client();
        $url = 'http://eservices.mtit.gov.ps/ws/gov-services/ws/getData'; // استبدل هذا برابط الـ API الخاص بجدول الترتيب الإسباني

        try {
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody(), true);

            // يمكنك استخدام $data هنا لمعالجة البيانات المسترجعة
            // مثلاً، يمكنك إرجاع البيانات إلى عرض (view) لتظهرها للمستخدم
            return view('league-table', ['data' => $data]);
        } catch (\Exception $e) {
            // في حالة وجود خطأ في استدعاء الـ API
            // يمكنك معالجة الخطأ هنا
            return view('layout.standard', ['message' => $e->getMessage()]);
        }
    }
}