<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index()
    {
        return view('user.articles.index', [
            'ooArticles' => Article::latest()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($articleSlug)
    {
        $oArticle = Article::where('slug', $articleSlug)->first();

        if (!$oArticle) {
            return view('errors.404');
        }

        return view('user.articles.article', [
            'oArticle' => $oArticle
        ]);
    }
}
