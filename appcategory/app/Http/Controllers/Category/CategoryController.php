<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Category::paginate(10);
        return view('category/index', ['category' => $data]);
    }

    public function search(Request $request)
    {
        $inputcari = $request->cari;
        $data = Category::where('name', "like", '%'.$inputcari."%")->paginate();
        return view('category/index', ['category' => $data]);
    }

    public function find($id)
    {
        $data = Category::find($id);
        return view('category/update', ['edit' => $data]);
    }
    
    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "is_publish" => "required"
        ];
        if (!$request->validate($rules)) {

            return view('category/create', [
                "validation" => $request->validator,
            ]);
        } else {

            $category = new Category();
            $category->name = $request->name;
            $category->is_publish = $request->is_publish;
            $category->save();
            return redirect('category')->with('success', 'Category saved.');
        }
    }

    public function storeupdate(Request $request)
    {
        $category = new Category();
        $data = [
            'name' => $request->name,
            'is_publish' => $request->is_publish,
        ];

        $category->where('id',$request->id)->update($data);

        return redirect('category')->with('success', 'Category update.');  
    }

    public function delete($id)
    {
        $category = new Category();
        $category->where('id', $id)->delete();
        return redirect('category')->with('success', 'Category delete.');  
    }

}
