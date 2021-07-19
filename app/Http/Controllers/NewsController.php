<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('news.index',[
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        return view('news.show');
    }
}
