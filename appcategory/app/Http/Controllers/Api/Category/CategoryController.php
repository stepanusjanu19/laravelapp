<?php

namespace App\Http\Controllers\Api\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //

    public function index()
    {
        # code...
        $data = Category::all();
        return response()->json([
            "success" => true,
            "message" => "Data Kategori",
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'is_publish' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::create([
            'name' => $request->name,
            'is_publish' => $request->is_publish
        ]);

        if($category)
        {
            return response()->json([
                'success' => true,
                "message" => "Data Category Added",
                'kategori' => $category 
            ], 201);
        }

        return response()->json([
            'success' => false,
            "message" => "Data Category Failed",
        ], 409);
    }

    public function show($id)
    {
        $findata = Category::find($id);

        if(is_null($findata))
        {
            return response()->json([
                "success" => false,
                "message" => "Data Kategori Not Found",
            ], 422);
        }
        
        return response()->json([
            "success" => true,
            "message" => "Data Kategori Founded",
            "data" => $findata
        ]);
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'is_publish' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $category->update([
            'name' => $request->name,
            'is_publish' => $request->is_publish
        ]);

        return response()->json([
            "success" => true,
            "message" => "Data Kategori Updated",
            "data" => $category
        ]);

    }

    public function delete($id)
    {
        $category = Category::find($id);
        
        $category->delete();

        return response()->json([
            "success" => true,
            "message" => "Data Kategori Deleted",
            "data" => $category
        ]);
    }

}
