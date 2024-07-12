<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ImagesTrait;


class Usercontroller extends Controller
{

    use ImagesTrait;
    public function create(){
        return view('Auth.create');
    }

    public function store(Request $request){

        $fileName= time() . '.'.$request->imgpath->extension();
        $this->uploadimg($request->imgpath,$fileName,'userImg');

        $request->validate([
            'User_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'Phone' => 'required|string|max:15',

        ]);

        User::create([
            'User_name'=>$request->User_name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'Address'=>$request->Address,
            'Phone'=>$request->Phone,
            'role' => $request->role ?? 'user',
            'imgpath'=>$fileName,

        ]);
        return redirect()->route ('index_user');
    }
    public function index(Request $request){
        if (!Auth::check()) {
           
            return redirect()->route('showLoginForm');
        }
        //$users=Auth::user();
        //dd($users);
        $users = User::all();
        //$users = User::where('id',$users->id)->get();
    
        return view ('Auth.index',compact('users'));
    }
    public function edit(Request $request){
        $users= User::where('id',$request->id)->first();
        //dd($users);
        return view ('Auth.edit',compact('users'));
    }
    public function update(Request $request){
        $update= User::where('id',$request->id)->first();
        
        $update->update([
            'User_name'=>$request->User_name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
            'Address'=>$request->Address,
            'Phone'=>$request->Phone,
        ]);
        return redirect()->route ('index_user');
    }
    public function delete($id){
        $users= User::find($id);
        $users->delete();
        return redirect()->route ('index_user');
    }
    public function showLoginForm(){
        //$users = User::all();
        //return view ('Auth.index',compact('users'));
        return view('Auth.login');
    }

    public function login(Request $request){
        $users = User::where('email', $request->email)->first();
        if ($users && Hash::check($request->password, $users->password)){
            Auth::login($users);
            $users = User::where('id', $users->id)->first();
                return view ('Auth.indexlogin',compact('users'));
            //return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['email' => 'The email or password is not correct']);
        }
    }

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return view('Auth.login');
}

public function FindFriend(){
    if (!Auth::check()) {
        return redirect()->route('showLoginForm');
    }
    $users = User::where('role', 'user')->get();
    return view ('Auth.FindFriend',compact('users'));
}

public function adminindex(Request $request){
    if (!Auth::check()) {
       
        return redirect()->route('showLoginForm');
    }
    $users = User::all();
    return view ('admin.adminUser',compact('users'));
}
}
