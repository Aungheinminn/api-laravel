<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->user = request()->user;
        $article->title = request()->title;
        $article->paragraph = request()->paragraph;
        $article->category = request()->category;
        $article->photo = request()->photo;
        // $article->user_id = 1;
        $article->save();

        return $article;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article = Article::find($id);
        $article->user = request()->user;
        $article->title = request()->title;
        $article->paragraph = request()->paragraph;
        $article->category = request()->category;
        // $article->photo = request()->photo;
        // $article->user_id = request()->user_id;

        $article->save();

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // $article = Article::find($id);
        $article->delete();

        return $article;
    }
}
