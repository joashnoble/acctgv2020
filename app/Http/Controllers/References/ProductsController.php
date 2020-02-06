<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\References\Product;
use App\Http\Resources\Reference;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::select(
            'products.*',
            'categories.category_name',
            'units.unit_name',
            )
            ->leftJoin('categories', 'categories.category_id', '=', 'products.category_id')
            ->leftJoin('units', 'units.unit_id', '=', 'products.parent_unit_id')
            ->where('products.is_active',TRUE)
            ->where('products.is_deleted',FALSE)
            ;
        return Reference::collection($products->get());
    }

}
