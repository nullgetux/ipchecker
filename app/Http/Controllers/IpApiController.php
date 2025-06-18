<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpApiController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->header('X-Forwarded-For') ?: 
              $request->header('X-Real-IP') ?: 
              $request->ip();
        
        if ($ip === '127.0.0.1' || $ip === '::1') {
            try {
                $publicIp = file_get_contents('https://api.ipify.org');
                if ($publicIp) {
                    $ip = $publicIp;
                }
            } catch (\Exception $e) {
                // If we can't get public IP, keep the current IP
            }
        }
        $userAgent = $request->header('User-Agent');
        return response()->json([
            'ip' => $ip,
            'user_agent' => $userAgent
        ]);
    }
} 