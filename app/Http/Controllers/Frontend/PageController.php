<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('position', 'asc')->where('visible', true)->get();
        $header_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position','header')->get();
        View::share([
            'categories' => $categories,
            'header_advertises' => $header_advertises,
        ]);

        $latest_news = Article::latest()->first();
        $articles = Article::latest()->skip(1)->limit(5)->get();
        $trending_articles = Article::where('trending',true)->latest()->limit(7)->get();
        return view('frontend.home', compact('latest_news','articles','trending_articles'));
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->latest()->get();
        return view('frontend.category', compact('category', 'articles'));
    }
}
