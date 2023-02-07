<?php

namespace App\Services\Contracts;

use App\Exceptions\UploadPDFException;
use App\Http\Requests\UploadPDFRequest;

interface PDFHandlerInterface
{
    /**
    * @throws UploadPDFException
    */
    public function uploadPdf(UploadPDFRequest $request): array;
}
