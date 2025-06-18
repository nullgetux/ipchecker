<?php

namespace App\Console\Commands;

use App\Models\IpHistory;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CleanOldHistory extends Command
{
    protected $signature = 'history:clean';
    protected $description = 'Clean IP history data older than 7 days';

    public function handle()
    {
        $date = Carbon::now()->subDays(7);
        
        $deleted = IpHistory::where('hit_at', '<', $date)->delete();
        
        $this->info("Deleted {$deleted} old history records.");
    }
} 