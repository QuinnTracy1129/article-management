<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles=Articles::whereNull('deleted_at')->get();
       return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $article=Articles::create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        $article->update($request->all());
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        // $article=Articles::find($article);
        $article->deleted_at =now();
        $article->update();
        return redirect('articles');

    }
}
