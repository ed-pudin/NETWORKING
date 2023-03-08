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
        $students = student::all();

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
        $email = Str::lower($request->regCompanyName);

        $userCompany = new User();
        $userCompany->email = $email.'@net.working.com';
        $userCompany->password = Str::random(13);
        $userCompany->rol = 'company';

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
        //Mostrar una empresa
        $company = new company();
        $company = company::where('user', '=', $id)->first();

        //Mostrar intereses
        $interests = new companyInterests();
        $interests = companyInterests::join('interests', 'interests.id', '=', 'company_interests.id')->where('company', '=', $company->id)->get();
        return view('company.profile', compact('company', 'interests'));
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
                return redirect()->route('admin.index');
            }else{
                session()->flash("status","Hubo un problema en la eliminación");
                return redirect()->route('admin.index');
            }
        }else{
            session()->flash("status","Hubo un problema en la eliminación");
            return redirect()->route('admin.index');
        }

    }
}
