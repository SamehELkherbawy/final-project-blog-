<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\profile;

class postcontroller extends Controller
{
    public function create(){
        if(Auth::id()){
            $user=Auth::user();
        return view ('post.create');
        }else{
            return redirect()->route('showLoginForm');
        }
    }
    public function store(Request $request){
        if(Auth::id()){
            $user=Auth::user();
        post::create([
            'title'=> $request->title,
            'Discription'=> $request->Discription,
            'Privacy'=> $request->Privacy,
            'post_date'=>date('Y-m-d H:i:s'),
            'user_id'=>$user->id,
        ]);
        return redirect()->route('index_post');
    }else{
        return redirect()->route('showLoginForm');
    }
    }
    public function index(){
        $id = Auth::user()->id;
        //$posts=post::where('user_id',$id)->with('User')->get()->latest(); 
        $posts = Post::where('user_id', $id)
        ->with('User')
        ->orderBy('id', 'desc') // Orders by the 'id' column in descending order
        ->first(); // Gets the first result
        return view('post.index', compact('posts'));
    }


    public function edit(Request $request){
        $posts=post::where('id',$request->id)->first();
        //dd($users);
        return view ('post.edit',compact('posts'));
    }
    public function update(Request $request){
        $update=post::where('id',$request->id)->first();

        //dd($update);
        $update->update([
            'title'=> $request->title,
            'Discription'=> $request->Discription,
            'Privacy'=> $request->Privacy,
            'post_date'=> $request->post_date,
            'user_id'=> $request->user_id,
        ]);
        return redirect()->route('profilePage');
    }
    public function delete($id){
        $posts=post::find($id);
        $posts->delete();
        return redirect()->route('profilePage');
    }

    public function viewprofile($id){
        $posts = Post::where('user_id', $id) ->where('Privacy', 'Public')->get();

        return view('profile.viewprofile', compact('posts'));
    }


}
