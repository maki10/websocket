<?php

namespace App\Services\PDF;

use App\Exceptions\UploadPDFException;
use App\Repositories\Contracts\PDFRepositoryInterface;
use App\Services\Contracts\File\FileInterface;
use App\Services\Contracts\File\PDFInterface;
use App\Services\Contracts\PDF\ParserInterface;
use Smalot\PdfParser\Parser;

class ParserService implements ParserInterface, PDFInterface
{
    public function __construct(
        private FileInterface $file,
        private PDFRepositoryInterface $PDF
    ) {}

    public function parsePdf(string $filePath, string $fileName, string $userId): bool
    {
        try {
            $text = $this->parsePDFFile($filePath);
        } catch (\Exception $e) {
            throw new UploadPDFException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        return $this->PDF->savePDFTextForUser($userId, $text, $fileName);
    }

    public function parsePDFFile(string $filePath): string
    {
        $pdfParser = new Parser();

        $text = $pdfParser->parseFile($filePath)->getText();

        $this->file->delete($filePath);

        return $text;
    }
}
