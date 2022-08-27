<?php

namespace App\Hash\Http\Controllers;

use App\Hash\Http\Requests\HashListRequest;
use App\Hash\Models\HashRegistreRepositoryInterface;
use App\Hash\Services\HashGeneratorService;
use App\Base\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Hash\Http\Requests\HashGenerateRequest;

class HashController extends Controller
{
    public function __construct
    (
        HashRegistreRepositoryInterface $hashRegistreRepository,
        HashGeneratorService            $hashGeneratorService
    )
    {
        $this->hashRegistreRepository = $hashRegistreRepository;
        $this->hashGeneratorService =   $hashGeneratorService;
    }

    public function generate(HashGenerateRequest $request): JsonResponse
    {
        $string = $request['string'];

        $result = $this->hashGeneratorService->execute($string);

        return response()->json($result, 201);
    }

    public function list(HashListRequest $request): JsonResponse
    {
        $qnty = $request->get('qnty') ?: null;

        $results = $this->hashRegistreRepository->getAllResults($qnty);
        return response()->json(['results' => $results, 'message' => 'success']);
    }
}
