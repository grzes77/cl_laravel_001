<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {

            return view('categories.create');
    }

    public function store(Request $request)
    {


        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect(route('categories.index'));
    }

    public function edit(Category $category){

        //dump($category);
        //$category = Category::find($id);

        return view('categories.edit',[
           'category' => $category
        ]);

    }
    public  function  update(Request $request, Category $category){
        $category->name = $request->name;
        $category->save();
        return redirect(route('categories.index') );
    }

    public function destroy(Category $category){
            $category->delete();
            return redirect(route('categories.index'));
    }
}
