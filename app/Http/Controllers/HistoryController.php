<?php

namespace App\Http\Controllers;

use App\Models\IpHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = IpHistory::orderBy('hit_at', 'desc')
            ->paginate(50);  // 50 data per halaman
        
        return view('history', [
            'histories' => $histories
        ]);
    }
} 