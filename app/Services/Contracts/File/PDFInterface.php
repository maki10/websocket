<?php

namespace App\Services\Contracts\File;

interface PDFInterface
{
    /**
     * @throws \Exception
     */
    public function parsePDFFile(string $filePath): string;
}
