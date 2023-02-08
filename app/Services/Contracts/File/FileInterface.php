<?php

namespace App\Services\Contracts\File;

use Illuminate\Http\UploadedFile;

interface FileInterface
{
    public function upload(UploadedFile $file): string;

    public function delete(string $filePath): bool;
}
