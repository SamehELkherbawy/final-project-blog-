<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\post;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class profilecontroller extends Controller
{
    //public function profilePage(){
      //  $id = Auth::user()->id;
       // $profile=profile::where('user_id',$id)->with(['post','User'])->get();
       // return view('profile.profilePage',compact('profile'));
    //}

    public function store(Request $request,$id){
        if(Auth::id()){
            $userId=Auth::user()->id;
            $profile = new Profile();
            $profile->user_id = $userId;
            $profile->post_id = $request->id; 
            $profile->save();

        return redirect()->route ('profilePage');
    }
    }

    public function profilePage(){
        $id = Auth::user()->id;
        $profile = profile::where('user_id', $id)->with(['post','User'])->get();
        
        return view('profile.profilePage', compact('profile'));
    }
/*
    public function profilePage(){
        $amount=0;

        $userId=Auth::user()->id;
        $data=profile::where('user_id',$userId)->with(['post','User'])->get();

        foreach ($data as $value){
            $profilepost=new order_items;
            $profilepost->user_name=$value->user_name;
            $profilepost->title=$value->title;
            $profilepost->Description=$value->Description;

        }
        return redirect()->route ('profilePage');

    }
        */
    
/*
    public function profilePage($id ){
        $userId=Auth::user()->id;
        $data=profile::where('user_id',$userId)->with(['post','User'])->get();


        foreach ($data as $value){
            $profilepost=new profilepost;
            $profilepost->user_name=$value->user_name;
            $profilepost->title=$value->title;
            $profilepost->save();
        }
        return redirect()->route ('profilePage',$id);
*/

public function adminProfilePage(Request $request,$id){
    $profile = profile::where('user_id',$id)->with(['post','User'])->get();
    
    return view('admin.adminProfilePage', compact('profile'));
}
}
