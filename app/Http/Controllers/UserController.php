<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
    
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
                "name" => "required",
                "email" => "required|unique:users,email",
                "password" => "required|confirmed|min:8",
                "role" => "nullable",
                "address" => "required",
                "phone" => "required",
                "avatar" => "image|file|max:2000"
            ]);
        if ($request->file('avatar')){
            $validasi ['avatar'] = $request->file('avatar')->store('post-avatar');
        }
        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);
        return redirect()->route('users.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);    
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request, User $user)
     {
         $validasi = $request->validate([
             "name" => "required",
             "email" => "required|unique:users,email," . $user->id,
             "password" => "required|confirmed|min:8",
             "role" => "nullable",
             "address" => "required",
             "phone" => "required",
             "avatar" => "image|file|max:2000"
         ]);
     
         if ($request->hasFile('avatar')) {
             if ($request->oldImage) {
                 Storage::delete($request->oldImage);
             }
             $validasi['avatar'] = $request->file('avatar')->store('post-images');
         }
     
         $validasi['password'] = bcrypt($validasi['password']);
     
         $user->update($validasi);
     
         return redirect()->route('users.index');
     }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
    
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
    
        if ($user) $user->delete();
    
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    
    }
}
