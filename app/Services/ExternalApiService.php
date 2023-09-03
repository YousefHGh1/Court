<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    private $baseUri = 'https://ws.gov.ps';

    public function getToken($clientId, $clientSecret)
    {
        $url = 'https://ssoidp.gov.ps/sso/module.php/sspoauth2/token.php';

        $response = Http::post($url, [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        return $response->json();
    }

    public function getCitizenById($token, $userId, $userIp, $userAgent, $id)
    {
        $url = $this->baseUri . '/citizen/id/' . $id;

        $response = Http::withHeaders([
            'x-sso-authorization' => $token,
            'x-user-id' => $userId,
            'x-user-ip' => $userIp,
            'x-user-agent' => $userAgent,
        ])->get($url);

        return $response->json();
    }

    public function getDetailedSsoInfoById($token, $userId, $userIp, $userAgent, $id)
    {
        $url = $this->baseUri . '/citizen/detailed-sso-info/id/' . $id;

        $response = Http::withHeaders([
            'x-sso-authorization' => $token,
            'x-user-id' => $userId,
            'x-user-ip' => $userIp,
            'x-user-agent' => $userAgent,
        ])->get($url);

        return $response->json();
    }
}