<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\company;
use App\Models\interests;
use App\Models\student;
use App\Models\studentInterests;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = new company();
        $companies = company::all();

        $allInterests = interests::all();


        return view('students.index', compact('companies', 'allInterests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allInterests = interests::all();
        return view('admin.register.student', compact('allInterests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = Str::lower(str_replace(" ", "",$request->regStudentName));

        $userStudent = new User();
        $userStudent->email = $email.'@net.working.com';
        $userStudent->password = Str::random(13);
        $userStudent->rol = 'student';
        

        if($userStudent->save()){
            $student = new student();

            $student->fullName = $request->regStudentName;
            $student->linkedin = $request->regStudentLinkedin;
            $student->user = $userStudent->id;

            if($request->regBtnStudentImg != null) {
                $fileName = time().'_'.uniqid();
                //Guardar archivo
                Storage::disk('public')->put($fileName, file_get_contents($request->file('regBtnStudentImg')));
            } else {
                $fileName = null;
            }

            $student->image = $fileName;

            if($student->save()){

                if($request->regStudentInterests != null) {
                    foreach($request->regStudentInterests as $regStudentInterest){
                        $studentInt = new studentInterests();
                        $studentInt->interests = $regStudentInterest;
                        $studentInt->student = $student->id;

                        if($studentInt->save()) {
                            session()->flash("status","Alumno registrado");
                        }
                        else { 
                            session()->flash("status","Hubo un problema en el registro");
                        }
                    }
                } else {
                    session()->flash("status","Alumno registrado");
                }

            } else {
                session()->flash("status","Hubo un problema en el registro");
            }
        } else {
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
        //Mostrar un alumno
        $student = new student();
        $student = student::where('user', '=', $id)->first();

        //Mostrar intereses
        $interests = new studentInterests();
        $interests = studentInterests::join('interests', 'interests.id', '=', 'student_interests.id')->where('student', '=', $student->id)->get();


        return view('students.profile', compact('student', 'interests'));
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
        if(studentInterests::where('student',$id)->delete()) {

            $student = student::find($id);

            if($student->delete()) {
                session()->flash("deleteStudent","Alumno eliminado correctamente");
            } else {
                session()->flash("deleteStudent","Ha ocurrido un error");
            }

            return redirect()->back();
        }

    }
}
