<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\company;
use App\Models\companyInterests;
use App\Models\student;
use App\Models\interests;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista de estudiantes
        $students = new student();
        $students = student::all()->take(20);

        $allInterests = interests::all();


        return view('company.index', compact('students', 'allInterests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allInterests = interests::all();
        return view('admin.register.company', compact('allInterests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->regCompanyName == null)
        {
            session()->flash("status","Hubo un problema en el registro");
            return redirect()->route('admin.index');
        }
        
        $email = Str::lower($request->regCompanyName);

        $userCompany = new User();
        $userCompany->email = $email.'@net.working.com';
        $userCompany->password = Str::random(13);
        $userCompany->rol = 'company';

        $userCompanyValidate = User::where('email', $email.'@net.working.com')->first();

        if($userCompanyValidate)
        {
            session()->flash("status","Nombre ya existente");
            return redirect()->route('admin.index');
        }
        
        if($userCompany->save()){
            $company = new company();

            $company->fullName = $request->regCompanyName;
            $company->linkedin = $request->regCompanyLinkedin;
            $company->user = $userCompany->id;

            if($company->save()){

                if($request->regCompanyInterests != null){
                    foreach($request->regCompanyInterests as $regCompanyInterest){
                        $companyInt = new companyInterests();
                        $companyInt->interests = $regCompanyInterest;
                        $companyInt->company = $company->id;

                        if($companyInt->save())
                            session()->flash("status","Empresa registrada");
                        else
                            session()->flash("status","Hubo un problema en el registro");
                    }
                }else{
                    session()->flash("status","Empresa registrada");
                }

            }else{
                session()->flash("status","Hubo un problema en el registro");
            }
        }else{
            session()->flash("status","Hubo un problema en el registro");
        }

        return redirect()->route('admin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Validación de si es la misma empresa
        if(session()->get('id') == $id)
        {
            //Mostrar una empresa
            $company = new company();
            $company = company::where('user', '=', $id)->first();
    
            //Mostrar intereses
            $interests = new companyInterests();
            $interests = companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')->where('company', '=', $company->id)->get();
    
            return view('company.profile', compact('company', 'interests'));
        }
        else
        {
            return redirect()->route('empresa.index');
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
        //if(session()->get('id') == $id)
        //{
            //Vista de editar
            $cmpy = new company();
            $cmpy = company::where('id', '=', $id)->first();
    
            //Mostrar intereses
            $interests = new companyInterests();
            $interests = companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')->where('company', '=', $cmpy->id)->get();
    
            $allInterests = interests::all();
    
            $user = new User();
            $user = User::where('id', '=', $cmpy->user)->first();
    
            return view('admin.edit.company', compact('cmpy', 'interests', 'allInterests', 'user'));
        //}
        //else
        //{
        //    return redirect()->route('empresa.index');
        //}
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
        //Editar
        $cmpy = new company();
        $cmpy = company::where('id', '=', $id)->first();
        
        if($request->regCompanyName == null || $request->regCompanyPass == null)
        {
                session()->flash("status","Hubo un problema en el registro");
               return redirect()->route('admin.index');
        }

        $cmpy->fullName = $request->regCompanyName;
        $cmpy->linkedin = $request->regCompanyLinkedin;

        $user = new User();
        $user = User::where('id', '=', $cmpy->user)->first();

        $user->password = $request->regCompanyPass;

        $interests = new companyInterests();
        $interests = companyInterests::where('company', '=', $id)->get();

        foreach($interests as $interest)
        {
            if(!($interest->delete()))
            {
                session()->flash("status","Hubo un problema en la edición");
                return redirect()->route('admin.index');
            }
        }

        if($request->regCompanyInterests != null){
            foreach($request->regCompanyInterests as $regCompanyInterest){
                $companyInt = new companyInterests();
                $companyInt->interests = $regCompanyInterest;
                $companyInt->company = $cmpy->id;

                if(!($companyInt->save())){
                    session()->flash("status","Hubo un problema en la edición");
                    return redirect()->route('admin.index');
                }

            }
        }else{
            session()->flash("status","Se editó correctamente");
        }

        if($user->save() && $cmpy->save()){
            session()->flash("status","Se editó correctamente");
        }else{
            session()->flash("status","Hubo un problema en la edición");
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar company interests
        //Eliminar usuario
        //Eliminar empresa

        $interests = new companyInterests();
        $interests = companyInterests::where('company', '=', $id)->get();

        foreach($interests as $interest)
        {
            if(!($interest->delete()))
            {
                session()->flash("status","Hubo un problema en el registro");
                return redirect()->route('admin.index');
            }
        }


        $company = new company();
        $company = company::where('id', '=', $id)->first();

        $user = new user();
        $user = User::where('id', '=', $company->user)->first();

        if($company->delete()){

            if($user->delete()){
                session()->flash("status","Se eliminó correctamente");
            }else{
                session()->flash("status","Hubo un problema en la eliminación");
                return redirect()->route('admin.index');
            }
        }else{
            session()->flash("status","Hubo un problema en la eliminación");
            return redirect()->route('admin.index');
        }

        return redirect()->route('admin.index');

    }
    public function verEmpresa($id){

        //Mostrar una empresa
        $compy = new company();
        $compy = company::where('id', '=', $id)->first();
        
        if($compy == null)
        {
            return redirect()->route('estudiante.index');
        }
        else
        {
            //Mostrar intereses
            $interests = new companyInterests();
            $interests = companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')->where('company', '=', $compy->id)->get();
    
    
            return view('students.companyProfile', compact('compy', 'interests'));
        }

    }
}
