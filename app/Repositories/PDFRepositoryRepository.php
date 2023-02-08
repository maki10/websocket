<?php

namespace App\Repositories;

use App\Models\Pdf;
use App\Repositories\Contracts\PDFRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class PDFRepositoryRepository implements PDFRepositoryInterface
{
    public function __construct(private Pdf $pdf) {}

    public function savePDFTextForUser(string $userId, string $text, string $fromFile): bool
    {
        return (bool) $this->pdf->create([
            'text' => $text,
            'user_id' => $userId,
            'file_name' => $fromFile,
        ]);
    }

    public function getMy(string $userId): Paginator
    {
        return $this->pdf
            ->select(['id', 'file_name', 'created_at'])
            ->where('user_id', $userId)
            ->paginate(5);
    }

    public function findInPDF(string $userId, string $searchTerm): Builder
    {
        return $this->pdf
            ->select(['id', 'file_name', 'text', 'created_at'])
            ->where('user_id', $userId)
            ->whereRaw('LOWER(`text`) LIKE ? ',['%'. $searchTerm .'%']);
    }
}

