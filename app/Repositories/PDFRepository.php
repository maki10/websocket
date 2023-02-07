<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\PDFInterface;

class PDFRepository implements PDFInterface
{
    public function savePDFTextForUser(User $user, string $text, string $fromFile): bool
    {
        return (bool) $user->pdfs()->create([
            'text' => $text,
            'file_name' => $fromFile,
        ]);
    }
}
