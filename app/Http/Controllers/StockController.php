<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $stocks = Stock::limit(10);
        if ($request->query('sort')) {
            $sort_key = $request->query('sort');
            $stocks = $this->sortBy($stocks, $sort_key);
        }

        $stocks = $stocks->get();
        return response()->json(['data' => StockResource::collection($stocks)], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param Stock $stock
     * @return JsonResponse
     */
    public function show(Stock $stock): JsonResponse
    {
        return response()->json(['data' => new StockResource($stock)], Response::HTTP_OK);
    }

    protected function sortBy(Stock $stock, string $sort_type)
    {
        $sort_fields = [
            'date' => 'created_at',
            'rate' => 'rate_change_percent',
            '-date' => 'created_at',
            '-rate' => 'rate_change_percent',
        ];
        if (!array_key_exists($sort_type, $sort_fields))
            return null;

        $order = str_contains('-', $sort_type) ? 'desc' : 'asc';

        return $stock->orderBy($sort_fields[$sort_type], $order);
    }
}
