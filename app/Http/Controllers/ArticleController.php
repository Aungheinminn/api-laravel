<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
 
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
        // $name = request()->file('photo')->getClientOriginalName();
        $file = request()->file('photo')->getClientOriginalExtension();
        $name = time().'.'.$file;

        $request->file('photo')->storeAs('public/images/', $name);
 
        $url = asset("storage/images/".$name);

        // $url = Storage::get($name);
        $article = new Article;
        $article->user = request()->user;
        $article->title = request()->title;
        $article->paragraph = request()->paragraph;
        $article->category = request()->category;
        $article->photo = $url;
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
        // $article = Article::find($id);
        // if($request->hasFile('photo')){ 
        //     $file = request()->file('photo')->getClientOriginalExtension();
        //     $postfile = public_path('images/'.$file);

        //     if(File::exists($postfile)){
        //         File::delete($postfile);
        //     }    
          

        
        // }    
        $file = request()->file('photo')->getClientOriginalExtension();
        $name = time().'.'.$file;

        $request->file('photo')->storeAs('public/images/', $name);
        $url = asset("storage/images/".$name);
        // $article = new Article;
        $article->user = request()->user;
        $article->title = request()->title;
        $article->paragraph = request()->paragraph;
        $article->category = request()->category;
        $article->photo = $url;  
        // $article->user_id = request()->user_id;
        $article->update();

        return $article;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {   
        // if($request->hasFile('photo')){
        //     $article->photo->delete();
        // }
        // $article = Article::find($id);
        // $article->photo->delete();
        $article->delete();

        return $article;
    }
}
