<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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
        $user = new User();
        $user = User::where('email', '=', $request->email, 'and')->where('password', '=', $request->pas)->first();
        if($user != null){

            session()->put('id', $user->id);
            if($user->rol == 'admin'){
                return redirect()->route('admin.index');
            }else if ($user->rol == 'company'){
                return redirect()->route('empresa.index');
            }else if($user->rol == 'student'){
                return redirect()->route('estudiante.index');
            }
        }
        else{
            session()->flash("status","Contraseña o clave incorrecta");
            return redirect()->route('inicioSesion.index');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logOut(){
        if(session()->exists('id')){
            session()->forget('id');
        }

        return redirect('/');
    }
}
