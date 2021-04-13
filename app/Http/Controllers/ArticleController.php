<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        //get articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        //return colletion of articles as a resource
        return ArticleResource::collection($articles);
    }

    public function show($id)
    {
        //get an article
        $article = Article::findOrFail($id);

        return new ArticleResource($article);

    }

    // public function store(Request $request)
    // {
    //     $article = Article::create($request->all());
        
    //     if($article->save())
    //     {
    //         return new ArticleResource($article);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     $article = Article::findOrFail($id);
    //     $article->update($request->all());
    //     return new ArticleResource($article);
    // }

    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrfail
        ($request->article_id) : new Article;

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if($article->save()){
            return new ArticleResource($article);
        }
        
    }
    

    
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->delete())
        {
            return new ArticleResource($article);
        }
    }
}
