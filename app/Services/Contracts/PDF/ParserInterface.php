<?php

namespace App\Services\Contracts\PDF;

use App\Exceptions\UploadPDFException;

interface ParserInterface
{
    /**
    * @throws UploadPDFException
    */
    public function parsePdf(string $filePath, string $fileName, string $userId): bool;
}
