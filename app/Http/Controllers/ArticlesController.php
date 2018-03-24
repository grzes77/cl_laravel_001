<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\File;
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

        $files= File::all();
        $categories = Category::all();
        return view('articles.create', [
            'categories' => $categories,
            'files' => $files
        ]);
    }


    public function store(ArticlesRequest $request)
    {
        //dd($request->all());
        $article = Article::create($request->all());
        $article->files()->attach($request->get('file_id'));
        return redirect( route('articles.index') );
    }


    public function show($id)
    {

    }


    public function edit(Article $article)
    {
        $files = File::all();
        $categories = Category::all();



        //dd($selectedFiles);




        return view('articles.edit',
            ['article' => $article,
            'categories' => $categories,
             'files'=> $files,
                'flatSelectedFiles' => $article->files()->pluck('id')->toArray()
            ]
            );
    }


    public function update(ArticlesRequest $request, Article $article)
    {

        $article->update($request->all());
        $article->files()->sync($request->get('file_id'));
        return redirect( route('articles.index') );
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect( route('articles.index') );
    }
}