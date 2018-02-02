<?php

namespace App\Http\Controllers;

use App\Repositories\CatalogRepository;
use App\Repositories\MangaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * @param Request $request
     * @param CatalogRepository $catalogRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCatalog(Request $request, CatalogRepository $catalogRepository)
    {
        if ($request->input('order')) {
            $catalogRepository->setOrder($request->input('order'));
        }

        if ($request->input('type')) {
            $catalogRepository->setType($request->input('type'));
        }

        if ($request->input('tags')) {
            $catalogRepository->setTags($request->input('tags'));
        }

        try {
            $res = $catalogRepository->get();
            return response($res,200)->header('Content-Type', 'application/json');
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }

    }

    /**
     * @param Request $request
     * @param MangaRepository $mangaRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getManga(Request $request, MangaRepository $mangaRepository)
    {
        $request->validate([
            'id' => 'required',
        ]);

        try {
            $res = $mangaRepository->getById($request->input('id'));
            return response()->json([
                'status' => true,
                'data' => $res
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
