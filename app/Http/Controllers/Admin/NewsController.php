<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsUpdate;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index',[
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:199'],
            'category_id' => ['required', 'integer', 'min:1'],
            'status' => ['required'],
            'descripton' => ['sometimes']
        ]);

        $data = $request->only(['category_id', 'title', 'status', 'description']);
        $data['slug'] = Str::slug($data['title']);
        
        $news = News::create($data);

        if($news){
            return redirect()->route('admin.news.index')
                ->with('success', 'News created!');
        }

        return back()->with('error', 'News failed to create!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdate $request, News $news)
    {
        
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        $statusNews = $news->fill($data)->save();
        
        if($statusNews){
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.updated.success'));
        }

        return back()->with('error', __('message.admin.news.updated.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()){
            try{
                $news->delete();
            }catch(\Exception $e){
                report($e);
            }
        }
    }

}
