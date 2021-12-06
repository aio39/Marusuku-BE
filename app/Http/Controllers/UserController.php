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
    public function index(Request $request)
    {
        return $request->user();
    }



    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    /**
     *
     * Display the specified resource.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;

        return $user->update()
            ? response()->json($user)
            : response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function register(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $path = $request->file('photo')->storeAs('avatars',$request->user()->id.'.png');
        $user->avatar = $path;
        dd(Storage::url($path));

        return $user->update()
            ? response()->json()
            : response()->json([],500);
    }
}
