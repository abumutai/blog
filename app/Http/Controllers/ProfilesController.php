<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ProfileNotification;
use App\Notifications\AccountsNotification;
use Illuminate\Support\Facades\Notification;

class ProfilesController extends Controller
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
        $profiles= User::all();
        return view('admin.profiles',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $user= User::find($id);
            $articles= Article::all()->where('user_id',$id)->count();
           if(auth()->user()->id==$id){
                return view('admin.profile',compact('user','articles'));
           }
           else{
               return view('admin.view_profile',compact('user','articles'));
           }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       // dd($request->all());
       $request->validate([
           'name'=>'string',
           'email'=>'email',
           'password'=>'',
           'photo'=>'image'
       ]);
      
        $profile= User::findOrFail($id);
        $profile->name= $request->name;
        $profile->email=$request->email;
       
        if($request->photo){
             $photoName= time().'.'.$request->photo->getClientOriginalExtension();
             $profile->photo= $photoName;
             $request->photo->move(public_path('image'),$photoName);
        }
        if($request->password==""){
            $profile->password=$profile->password;
        }
        else{
            $profile->password=Hash::make($request->password);
        }
        $profile->phone= $request->phone;
        $profile->about=$request->about;
        $profile->save();
        $user= User::all()->where('role','admin');
        $name=$profile->name;
        $message= $name.' updated their profile';
        Notification::send($user,new ProfileNotification($message,$name));
        return redirect('/profile')->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $subject= "Termination of service";
        $message="This is to notify your services at Flash News have been terminated. 
        ";
        $user->notify(new AccountsNotification($profile,$subject,$message));
        $user->delete();
        return redirect()->route('admin')->with('success','User profile deleted successfully');
        
    }
    public function block($id)
    {
        if(Gate::allows('block-user',auth()->user()))
        {
            $articles=Article::all();
            $users= User::all();
            $profile= User::find($id);
            $profile->status='blocked';
            $profile->save();
            $subject= "Deactivation of account";
            $message="This is to notify you that your account to be deactivated until further notice.
            We regret for the enforcement of actions as means of ensuring adherence to our terms of service. You will receive communications on next course of actions.
            ";
            $profile->notify(new AccountsNotification($profile,$subject,$message));
            return back()->with('success','User profile blocked successfully');
       
        }
        else{
            return 'Unauthorized action';
        }
    }
    public function unblock($id)
    {
        if(Gate::allows('block-user',auth()->user()))
        {
            $articles=Article::all();
            $users= User::all();
            $profile= User::find($id);
            $profile->status='active';
            $profile->save();
            $subject= "Activation of account";
            $message="This is to notify you that your account has been activated.
            To prevent such actions from occuring in future, we advise you to
            abide by the terms and conditions";
            $profile->notify(new AccountsNotification($profile,$subject,$message));
            return back()->with('success','User profile has been unblocked successfully');
       
        }
        else{
            return 'Unauthorized action';
        }
    }
    public function delete($id)
    {
        $user= User::find($id);
        $name=$user->name;
        $user->delete();
        $subject= "Termination of service";
        $message="This is to notify you that your services has been terminated";
        $user->notify(new AccountsNotification($name,$subject,$message));
        return redirect('/admin')->with('success','User profile deleted successfully');
        
    }
}
