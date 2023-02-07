<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface PDFParserInterface
{
    /**
     * @throws \Exception
     */
    public function parseFile(UploadedFile $file): string;
}
