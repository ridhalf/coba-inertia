<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use function Termwind\render;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return Inertia::render('Users',[
            'users' => $users,
        ]);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' =>'required|email:dns|unique:users',
            'password'=>'required|min:8',
        ],[
            'name.required' =>'Nama harus diisi',
            'email.required' =>'Email harus diisi',
            'email.email' =>'Email harus dalam format email',
            'email.unique' =>'Email sudah terdaftar',
            'password.min' =>'Password terlalu pendek',
            'password.required' =>'Password harus diisi',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        sleep(1.5);
        return redirect('/user')->with('message','Data berhasil disimpan');
    }
    public function edit($id)
    {
        $user = User::select('id','email','password','name')->where('id',$id)->first();
        return Inertia::render('EditUser',[
            'user' =>$user
        ]);
    }
    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' =>'required|email:dns|unique:users',
            'password'=>'required|min:8',
        ],[
            'name.required' =>'Nama harus diisi',
            'email.required' =>'Email harus diisi',
            'email.email' =>'Email harus dalam format email',
            'email.unique' =>'Email sudah terdaftar',
            'password.min' =>'Password terlalu pendek',
            'password.required' =>'Password harus diisi',
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        try{
            $user->save();
            return redirect('/user')->with('message','berhasil disimpan');
        }catch (QueryException $e){
            return redirect('/user')->with('message','gagal disimpan');
        }
    }
}
