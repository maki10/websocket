<?php

namespace App\Services;

use App\Events\PDFUploadEvent;
use App\Exceptions\UploadPDFException;
use App\Http\Requests\UploadPDFRequest;
use App\Repositories\Contracts\PDFInterface;
use App\Services\Contracts\PDFHandlerInterface;
use App\Services\Contracts\PDFParserInterface;

class PDFHandlerService implements PDFHandlerInterface
{
    public function __construct(private PDFParserInterface $parser, private PDFInterface $PDF) {}

    public function uploadPdf(UploadPDFRequest $request): array
    {
        broadcast(new PDFUploadEvent(['state' => 'Processing started']));

        try {
            broadcast(new PDFUploadEvent(['state' => 'Extracting text']));
            $text = $this->parser->parseFile($request->pdf);
        } catch (\Exception $e) {
            throw new UploadPDFException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        broadcast(new PDFUploadEvent(['state' => 'Saving text']));

        return [
            'status' => $this->PDF->savePDFTextForUser($request->user(), $text, $request->pdf->getClientOriginalName())
        ];
    }
}
