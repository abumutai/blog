<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ArticlesNotifications;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkstatus');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= auth()->user()->id;
            $articles = Article::where('user_id',$id)->get();
            //dd($articles);
            return view('articles.index',compact('articles'));
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
    public function store(Request $request)
    {
            $data=$request->validate([
                'title'=>'required|unique:articles|string',
                'category'=>'required',
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
                'content'=>'required|min:50'
            ]);
            $article= new Article;
            $article->user_id= Auth::user()->id;
            $article->title= $request->title;
            $article->category= $request->category;
            $photoName= time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('article_images'),$photoName);
            $article->photo=$photoName;
            $article->content=$request->content;
            $article->save();
            
            $user= User::all()->where('role','admin');
            $message=$article->user->name.' created a new article '.$article->title;
            Notification::send($user,new ArticlesNotifications($article,$message));
    
            return redirect('/article')->with('success','Article created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $article= Article::findOrFail($id);
            return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // Gate::authorize('update',$id);
        $article= Article::findOrFail($id);
            return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article= Article::findOrFail($id);
        $request->validate([
            'title'=>'string',
            'category'=>'string',
            'photo'=>'image',
            'content'=>'string'
        ]);
        $article->user_id= Auth::user()->id;
        $article->title= $request->title;
        $article->category= $request->category;
        if($request->photo){
        $photoName= time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('article_images'),$photoName);
        }
        else{
            $photoName=$article->photo;
        }
        $article->photo=$photoName;
        $article->content=$request->content;
        $article->save();
        $user= User::all()->where('role','admin');
        $message=$article->user->name.' updated article '.$article->title;
        Notification::send($user,new ArticlesNotifications($article,$message));

        return redirect('/article')->with('success','Article updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article= Article::findOrFail($id);
        $article->delete();
        $user= User::all()->where('role','admin');
        $message=$article->user->name.' deleted article '.$article->title;
        Notification::send($user,new ArticlesNotifications($article,$message));

        return redirect('/article')->with('success','Article deleted successfully');
    }
}
