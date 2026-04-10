<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ReportController extends Controller
{
    /**
     * Exibe produtos com estoque abaixo do limite (10 por padrão).
     */
    public function lowStock(Request $request)
    {
        $limit = (int) $request->get('limit', 10);
        $products = Product::where('quantity', '<', $limit)->orderBy('quantity', 'asc')->get();
        return view('reports.low_stock', compact('products', 'limit'));
    }
}
