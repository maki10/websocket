<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchPDFRequest;
use App\Http\Requests\UploadPDFRequest;
use App\Http\Resources\GetMyPdfResources;
use App\Jobs\SearchPDFJob;
use App\Jobs\UploadPDFJob;
use App\Repositories\Contracts\PDFRepositoryInterface;
use App\Services\Contracts\File\FileInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PdfController extends Controller
{
    public function __construct(private PDFRepositoryInterface $PDF, private FileInterface $file) {}

    public function getMy(): AnonymousResourceCollection
    {
        return GetMyPdfResources::collection($this->PDF->getMy(request()->user()->id));
    }

    public function upload(UploadPDFRequest $request): JsonResponse
    {
        UploadPDFJob::dispatch(
            $this->file->upload($request->file('pdf')),
            $request->file('pdf')->getClientOriginalName(),
            $request->user()->id
        );

        return response()->json(['status' => 'uploading']);
    }

    public function search(SearchPDFRequest $request): JsonResponse
    {
        SearchPDFJob::dispatch($request->search, $request->user()->id);

        return response()->json(['status' => 'searching']);
    }
}
