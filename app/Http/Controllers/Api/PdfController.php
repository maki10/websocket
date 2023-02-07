<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UploadPDFException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadPDFRequest;
use App\Services\Contracts\PDFHandlerInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    public function __construct(private PDFHandlerInterface $PDFHandler) {}

    public function upload(UploadPDFRequest $request): JsonResponse
    {
        try {
            return response()->json($this->PDFHandler->uploadPdf($request));
        } catch (UploadPDFException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
