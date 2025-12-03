<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function home()
    {
        $latest_news = Article::latest()->first();
        $categories = Category::orderBy('position', 'asc')->where('visible', true)->get();
        View::share([
            'categories' => $categories,
        ]);
        return view('frontend.home', compact('latest_news'));
    }
}
