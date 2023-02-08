<?php

namespace App\Services\File;

use App\Services\Contracts\File\FileInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileService implements FileInterface
{
    public function upload(UploadedFile $file): string
    {
        return storage_path('app/'. $file->store('local'));
    }

    public function delete(string $filePath): bool
    {
        return File::delete($filePath);
    }
}
