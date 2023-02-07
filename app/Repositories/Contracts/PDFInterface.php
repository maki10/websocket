<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface PDFInterface
{
    public function savePDFTextForUser(User $user, string $text, string $fromFile): bool;
}
