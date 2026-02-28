<?php

namespace App\Console\Commands;

use App\Jobs\AnalyzeJobOffer;
use App\Models\JobOffer;
use App\Services\JobApiService;
use Illuminate\Console\Command;

class JobsFetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch job offers from external API and store them in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching job offers from external API...');
        
        $jobApiService = new JobApiService();
        $offers = $jobApiService->fetchJobOffers();
        
        $savedCount = 0;
        $skippedCount = 0;
        
        foreach ($offers as $offerData) {
            // Check if offer already exists by url_original
            $existingOffer = JobOffer::where('url_original', $offerData['url_original'])->first();
            
            if ($existingOffer) {
                $this->line("Skipping duplicate offer: {$offerData['title']}");
                $skippedCount++;
                continue;
            }
            
            // Create new job offer
            $jobOffer = JobOffer::create([
                'title' => $offerData['title'],
                'company' => $offerData['company'],
                'location' => $offerData['location'],
                'description' => $offerData['description'],
                'url_original' => $offerData['url_original'],
                'is_processed' => false
            ]);
            
            // Dispatch analysis job to queue
            AnalyzeJobOffer::dispatch($jobOffer->id);
            
            $this->line("Saved new offer: {$offerData['title']} (analysis queued)");
            $savedCount++;
        }
        
        $this->info("\nProcess completed!");
        $this->info("New offers saved: {$savedCount}");
        $this->info("Duplicates skipped: {$skippedCount}");
        
        return Command::SUCCESS;
    }
}
