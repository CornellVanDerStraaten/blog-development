<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', [
            'ooArticles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oArticle = new Article();

        return view('admin.articles.create', [
            'oArticle' => $oArticle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        $oArticle = Article::createArticle($request->all(), $request->file('main_image'));

        if ($oArticle) {
            return redirect()->route('admin.articles.index')->with('success', 'Article created successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $oArticle)
    {
        return view('admin.articles.show', [
            'oArticle' => $oArticle,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $oArticle)
    {
        return view('admin.articles.edit', [
            'oArticle' => $oArticle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $oArticle)
    {
        $boolEditSuccess = $oArticle->updateArticle($request->all(), $request->file('main_image'));

        if ($boolEditSuccess) {
            return redirect()->route('admin.articles.show', $oArticle->id)->with('success', 'Article edited successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $oArticle)
    {
        $boolDestroySuccess = $oArticle->delete();

        if ($boolDestroySuccess) {
            return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }
}
