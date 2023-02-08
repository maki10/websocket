<?php

namespace App\Jobs;

use App\Events\PDFUploadEvent;
use App\Exceptions\UploadPDFException;
use App\Services\Contracts\PDF\ParserInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadPDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private string $filePath, private string $fileName, private string $userId) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ParserInterface $PDFHandler)
    {
        broadcast(new PDFUploadEvent([
            'state' => 'Processing PDF',
            'success' => true
        ]));

        try {
            $PDFHandler->parsePdf($this->filePath, $this->fileName, $this->userId);

            broadcast(new PDFUploadEvent([
                'state' => 'Uploaded',
                'success' => true
            ]));
        } catch (UploadPDFException $e) {
            broadcast(new PDFUploadEvent([
                'state' => $e->getMessage(),
                'success' => false
            ]));
        }
    }
}
