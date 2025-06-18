<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpHistory;

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
        
        // Simpan history
        IpHistory::create([
            'ip' => $ip,
            'user_agent' => $userAgent,
            'hit_at' => now()
        ]);

        // Hanya return view HTML
        return view('ip', [
            'ip' => $ip,
            'userAgent' => $userAgent
        ]);
    }
} 