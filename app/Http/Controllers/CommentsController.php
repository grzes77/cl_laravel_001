<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;
use App\Article;

class CommentsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::with('article')
            ->paginate(10);

        //dd($comments);

        return view('comments.index',[
            'comments' => $comments
        ]);
    }


    public function create()
    {
        $articles = Article::all();
        return view('comments.create', [
            'articles' => $articles
        ]);
    }


    /**
     * @param CommentsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CommentsRequest $request )
    {
        Comment::create($request->all());

        //dd($request);
        return redirect( route('comments.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Comment $comment)
    {
        $article = Article::all();
        return view('comments.edit',
            ['articles' => $article],
            ['comment' => $comment]);
    }


    public function update(CommentsRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect(route('comments.index'));
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect( route('comments.index') );
    }
}
