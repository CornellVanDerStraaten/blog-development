<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.frontpage', [
            'ooLatestArticles' => Article::query()->latest()->limit(5)->get()
        ]);
    }
}
