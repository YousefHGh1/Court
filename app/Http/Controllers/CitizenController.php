<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class CitizenController extends Controller
{
    public function getCitizenFullName($id)
    {
        // بيانات المصادقة
        $clientId = 'COURTS_MUJABALIA';
        $clientSecret = '_e0d668452ab87440a6552459facec9f70bf55d4e9f';

        // الحصول على التوكن
        $client = new Client();
        $response = $client->request('POST', 'https://ssoidp.gov.ps/sso/module.php/sspoauth2/token.php', [
            'form_params' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ],
        ]);

        $tokenData = json_decode($response->getBody(), true);

        if (isset($tokenData['access_token'])) {
            $accessToken = $tokenData['access_token'];

            // الحصول على بيانات المواطن
            $headers = [
                'x-sso-authorization' => 'Bearer ' . $accessToken,
                'x-user-id' => 'رقم هوية المستخدم للنظام',
                'x-user-ip' => 'ip جهاز مستخدم النظام',
                'x-user-agent' => 'بيانات جهاز مستخدم النظام user agent',
            ];

            $url = 'https://ws.gov.ps/citizen/id/' . $id;

            $response = $client->request('GET', $url, [
                'headers' => $headers,
            ]);

            // dd($response->getBody()->getContents());

            $citizenData = json_decode($response->getBody(), true);

            if (isset($citizenData['name'])) {
                $fullName = $citizenData['name'];
                return response()->json(['full_name' => $fullName]);
            } else {
                return response()->json(['error' => 'Failed to get citizen data.']);
            }
        } else {
            return response()->json(['error' => 'Failed to authenticate.']);
        }
    }

    public function getDta(Request $request)
    {
        $client = new Client();
        $res = $client->post('https://ssoidp.gov.ps/sso/module.php/sspoauth2/token.php', ['body' =>  '{
        "WB_USER_NAME_IN":"COURTS_MUJABALIA",
        "WB_USER_PASS_IN":"_e0d668452ab87440a6552459facec9f70bf55d4e9f",
        "DATA_IN": {
        "package":"MOI_GENERAL_PKG",
        "procedure":"CITZN_INFO",
        "ID":405208422
}

}']);

// dd($res);
        $rooms = json_decode($res->getBody(), true);
        $rooms = $rooms['DATA'][0];


        return $rooms;
    }
}