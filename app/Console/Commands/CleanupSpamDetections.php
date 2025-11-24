<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SpamDetection;
use Carbon\Carbon;

class CleanupSpamDetections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spam:cleanup {--days=30 : Number of days to keep records}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up old spam detection records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->option('days');
        $cutoffDate = Carbon::now()->subDays($days);

        $deletedCount = SpamDetection::where('created_at', '<', $cutoffDate)->delete();

        $this->info("Cleaned up {$deletedCount} spam detection records older than {$days} days.");

        // Also clean up expired blocks
        $expiredBlocks = SpamDetection::where('blocked_until', '<', now())
                                      ->where('blocked_until', '!=', null)
                                      ->update([
                                          'blocked_until' => null,
                                          'attempts' => 0
                                      ]);

        $this->info("Reset {$expiredBlocks} expired IP blocks.");

        return Command::SUCCESS;
    }
}