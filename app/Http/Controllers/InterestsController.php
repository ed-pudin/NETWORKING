<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\interests;
use App\Models\companyInterests;
use App\Models\student;
use App\Models\studentInterests;
use Illuminate\Support\Facades\Storage;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Regresar los invitados
        $interests = \App\Models\interests::all();
        //Vista de eventos

        return view('admin.interests', compact('interests'));
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

    public function show($id)
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
        $interests = new interests();

        //Nombre de archivo

        $interests->name =  $request->interest;

        if($interests->save()){
            session()->flash("status","Intereses registrados");
        }else{
            session()->flash("status","Hubo un problema en el registro");
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $interest = interests::find($id);
        $interest->delete();
        return redirect()->back();
    }
}
