<?php

namespace App\Http\Controllers;

use App\Repositories\CatalogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
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
}
