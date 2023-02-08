<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

interface PDFRepositoryInterface
{
    public function savePDFTextForUser(string $userId, string $text, string $fromFile): bool;

    public function getMy(string $userId): Paginator;

    public function findInPDF(string $userId, string $searchTerm): Builder;
}
