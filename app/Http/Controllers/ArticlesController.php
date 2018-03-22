<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::with('category')
            ->paginate(10);
//dump($articles);
        return view('articles.index',[
            'articles' => $articles
        ]);
    }



    public function create()
    {
        $categories = Category::all();
        return view('articles.create', [
            'categories' => $categories
        ]);
    }


    public function store(ArticlesRequest $request)
    {
                //dodawanie pojedynczo wszysztkich  // $article = new Article();
                //eleementow z formularza  // $article -> title = $request->title;
                                           // $article -> category_id = $request->category_id;
                                           // $article -> body = $request->body;
                                           // $article -> save();
        Article::create($request->all());
        return redirect( route('articles.index') );
    }


    public function show($id)
    {

    }


    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit',
            ['article' => $article],
            ['categories' => $categories]);
    }


    public function update(ArticlesRequest $request, Article $article)
    {
         //dodawanie pojedycznych art z form        //        $article-> title = $request -> title;
                                                    //        $article-> category_id = $request -> category_id;
                                                    //        $article-> body = $request -> body;
                                                    //        $article-> save();
        $article->update($request->all());
        return redirect( route('articles.index') );
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect( route('articles.index') );
    }
}