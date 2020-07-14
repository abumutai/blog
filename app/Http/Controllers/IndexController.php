<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
      $articles= Article::orderBy('created_at','DESC')->paginate(8);
        return view('pages.index',compact('articles'));
    }
    public function local()
    {
        $articles= Article::where('category','local')->orderBy('created_at','DESC')->paginate(8);
        return view('pages.local',compact('articles'));
    }
    public function entertainment()
    {
       $articles=Article::where('category','entertainment')->orderBy('created_at','DESC')->paginate(8);
        return view('pages.entertainment',compact('articles'));
    }
    public function sports()
    {
        $articles=Article::where('category','sports')->orderBy('created_at','DESC')->paginate(8);
        return view('pages.sports',compact('articles'));
    }
    public function lifestyle()
    {
        $articles=Article::where('category','lifestyle')->orderBy('created_at','DESC')->paginate(8);
        return view('pages.lifestyle',compact('articles'));
    }
    public function view($id)
    {
        $article= Article::findOrFail($id);
        $articles= Article::orderBy('created_at','DESC')->paginate('8');
        $related=Article::all()->where('category',$article->category)->where('id','!=',$id)->take(3);
        return view('pages.view',compact('article','articles','related'));
    }
}
