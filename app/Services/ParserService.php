<?php

namespace App\Services;

use App\Services\Contracts\PDFParserInterface;
use Illuminate\Http\UploadedFile;
use Smalot\PdfParser\Parser;

class ParserService implements PDFParserInterface
{
    /**
     * @throws \Exception
     */
    public function parseFile(UploadedFile $file): string
    {
        $pdfParser = new Parser();

        return $pdfParser->parseFile($file->path())->getText();
    }
}
