<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\References\Category;
use App\Http\Resources\Reference;
use Carbon\Carbon;
class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::select(
            'category_id',
            'category_name',
            'category_desc')
            ->where('is_active',TRUE)
            ->where('is_deleted',FALSE)
            ->orderBy('category_name', 'asc')
            ;
        return Reference::collection($categories->get())            
        ->response()
        ->setStatusCode(200);
    }

    public function create(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->date_created = Carbon::now();
        $category->save();

        return ( new Reference( $category ))
                ->response()
                ->setStatusCode(201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return ( new Reference($category))
        ->response()
        ->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->input('category_name');
        $category->category_desc = $request->input('category_desc');
        $category->date_modified = Carbon::now();
        $category->save();

        return ( new Reference( $category ))
                ->response()
                ->setStatusCode(201);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->is_deleted = 1;
        $category->save();

        return ( new Reference( $category ))
                ->response()
                ->setStatusCode(200);
    }    
    public function checkIfUsed()
    {
        $exists = 'false';
        return $exists;
    }
}
