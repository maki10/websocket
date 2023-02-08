<?php

namespace App\Jobs;

use App\Events\PDFEvent;
use App\Http\Resources\PDFResource;
use App\Repositories\PDFRepositoryRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SearchPDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private string $searchTerm, private string $userId) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PDFRepositoryRepository $PDF)
    {
        $PDF->findInPDF($this->userId, $this->searchTerm)
            ->chunk(1, function ($pdfs) { //Chunking is forced to 1 for frontend example
                foreach ($pdfs as $pdf) {
                    broadcast(new PDFEvent(new PDFResource($pdf)));
                }
            });
    }
}
