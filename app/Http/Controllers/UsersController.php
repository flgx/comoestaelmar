<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Flash;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('personas.index')->with('users',$users);
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
        if(Auth::user()->id == $id || Auth::user()->type == 'admin'){

           $user = User::find($id);
           return view('personas.edit')->with('user',$user);
       }else{
            return redirect()->route('user.index');
       }

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
        $user = User::find($id);

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->email = $request->email;
        //$user->password = bcrypt($request->password);
        $user->type = $request->type;

        $user->save();
        Flash::success('El usuario fue actualizado.');
        return redirect()->route('user.edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->type == 'admin'){
            $user = User::find($id);
            $user->delete();
            Flash::error("Usuario <strong>".$user->name."</strong> fue eliminado.");
            return redirect()->route('user.index');            
        }else{
            return redirect()->route('welcome');
        }
    }
}
