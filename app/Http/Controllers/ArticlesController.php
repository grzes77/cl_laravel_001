<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::with('category')
                            ->paginate(10);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }


    public function create()
    {
        $categories = Category::All();

        return view('articles.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id= $request->category_id;
        $article->save();

        return redirect(route('articles.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Article $article)
    {
        $categories = Category::All();

        return view('articles.edit',[
            'article' => $article,
            'categories' => $categories
        ]);
    }


    public function update(Request $request, Article $article)
    {



        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;
        $article->save();
        return redirect(route('articles.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}
