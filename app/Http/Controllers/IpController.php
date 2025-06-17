<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpController extends Controller
{
    public function index(Request $request)
    {
        // Get real IP address
        $ip = $request->header('X-Forwarded-For') ?: 
              $request->header('X-Real-IP') ?: 
              $request->ip();
        
        // If IP is still localhost, try to get public IP
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
        
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'ip' => $ip,
                'user_agent' => $userAgent
            ]);
        }
        
        return view('ip', [
            'ip' => $ip,
            'userAgent' => $userAgent
        ]);
    }
} 