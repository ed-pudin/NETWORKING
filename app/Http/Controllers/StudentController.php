<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\company;
use App\Models\interests;
use App\Models\expo;
use App\Models\student;
use App\Models\studentExpo;
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

        $allExpos = expo::all();

        return view('students.index', compact('companies', 'allInterests', 'allExpos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allInterests = interests::all();
        $allExpos = expo::all();
        return view('admin.register.student', compact('allInterests','allExpos'));
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
                            session()->flash("status","Estudiante registrado");
                        }
                        else {
                            session()->flash("status","Hubo un problema en el registro");
                        }
                    }
                } else {
                    session()->flash("status","Estudiante registrado");
                }

                foreach($request->regStudentExpos as $regStudentExpo){
                    $studentExpo = new studentExpo();
                    $studentExpo->expo = $regStudentExpo;
                    $studentExpo->student = $student->id;

                    if($studentExpo->save()) {
                        session()->flash("status","Estudiante registrado");
                    }
                    else {
                        session()->flash("status","Hubo un problema en el registro");
                    }
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
        //Mostrar un estudiante
        $student = new student();
        $student = student::where('user', '=', $id)->first();

        //Mostrar intereses
        $interests = new studentInterests();
        $interests = studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')->where('student', '=', $student->id)->get();

        //Mostrar expos
        $allExpos = studentExpo::join('expos', 'expos.id', '=', 'student_expos.expo')->where('student', '=', $student->id)->get();

        return view('students.profile', compact('student', 'interests', 'allExpos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Vista de editar

        //Estudiante a Editar
        $student = new student();
        $student = student::where('id', '=', $id)->first();

        //Intereses del Estudiante
        $studentInterests = new studentInterests();
        $studentInterests = studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')->where('student', '=', $student->id)->get();

        //EXPOS del Estudiante
        $studentExpos = new studentExpo();
        $studentExpos = studentExpo::join('expos', 'expos.id', '=', 'student_expos.expo')->where('student', '=', $student->id)->get();

        $allExpos = expo::all();
        $allInterests = interests::all();

        $user = new User();
        $user = User::where('id', '=', $student->user)->first();

        return view('admin.edit.student', compact('student', 'studentInterests', 'studentExpos', 'allInterests', 'allExpos', 'user'));
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
        $student = student::find($id);
        $userStudent = user::find($student->user);

        $userStudent->email = $request->adminEditStudentEmail;
        $userStudent->password = $request->adminEditStudentPassword;
        $userStudent->save();

        $student->fullName = $request->adminEditStudentName;
        $student->linkedin = $request->adminEditStudentLinkedin;

        if($request->adminEditBtnStudent != null) {
            //Nombre de archivo
            $fileName = time().'_'.uniqid();
            //Guardar archivo

            Storage::disk('public')->delete('/'.$student->image);

            Storage::disk('public')->put($fileName, file_get_contents($request->file('adminEditBtnStudent')));
        } else {
            $fileName = $request->originalImage;
        }
        $student->image = $fileName;

        studentInterests::where('student',$id)->delete();
        if($request->adminEditStudentInterests != null) {
            foreach($request->adminEditStudentInterests as $StudentInterest){
                $studentInt = new studentInterests();
                $studentInt->interests = $StudentInterest;
                $studentInt->student = $student->id;
                $studentInt->save();
            }
        }

        studentExpo::where('student',$id)->delete();
        if($request->regStudentExpos != null) {
            foreach($request->regStudentExpos as $StudentExpo){
                $studentExpo = new studentExpo();
                $studentExpo->expo = $StudentExpo;
                $studentExpo->student = $student->id;
                $studentExpo->save();
            }
        }

        if($student->save()) {
            session()->flash("status","Estudiante editado correctamente");
        }
        else {
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
        // Borrar la relacion con los intereses
        $interests = new studentInterests();
        $interests = studentInterests::where('student', '=', $id)->get();

        foreach($interests as $interest)
        {
            if(!($interest->delete()))
            {
                session()->flash("status","Hubo un problema en la eliminación");
                return redirect()->back();
            }
        }
        //Borrar expos
        $expos = studentExpo::where('student', '=', $id)->get();

        foreach($expos as $expo)
        {
            if(!($expo->delete()))
            {
                session()->flash("status","Hubo un problema en la eliminación");
                return redirect()->back();
            }
        }
        // Encontrar y borrar al Estudiante
        $student = student::where('id', '=', $id)->first();

        $user = new user();
        $user = User::where('id', '=', $student->user)->first();

        if($student->delete()){
            if($user->delete()) {
                session()->flash("deleteStudent","Estudiante eliminado correctamente");
            } else {
                session()->flash("deleteStudent","Ha ocurrido un error");
            }
        }else{
            session()->flash("status","Hubo un problema en la eliminación");
            return redirect()->back();
        }


        return redirect()->back();

    }
    public function verEstudiante($id){
        //Mostrar un estudiante
        $sdt = new student();
        $sdt = student::where('id', '=', $id)->first();

        //Mostrar intereses
        $interests = new studentInterests();
        $interests = studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')->where('student', '=', $sdt->id)->get();

        //Mostrar expos
        $allExpos = studentExpo::join('expos', 'expos.id', '=', 'student_expos.expo')->where('student', '=', $sdt->id)->get();

        return view('company.studentProfile', compact('sdt', 'interests', 'allExpos'));

    }

    public function editarImagen(Request $request, $id){

        $student = student::find($id);


        if($request->regBtnStudentImg != null) {
            //Nombre de archivo
            $fileName = time().'_'.uniqid();
            //Guardar archivo

            Storage::disk('public')->delete('/'.$student->image);

            Storage::disk('public')->put($fileName, file_get_contents($request->file('regBtnStudentImg')));
        } else {
            $fileName = $student->image;
        }
        $student->image = $fileName;

        if($student->save()) {
            session()->flash("status","Imagen cambiada");
        }
        else {
            session()->flash("status","Hubo un problema en la edición");
        }
        return redirect()->back();

    }

    public function apiStore(Request $request){

        //Verificar que el estudiante no ha sido registrado previamente

        $studentTmp = student::where('fullName', '=',$request->regStudentName)->first();

        if($studentTmp != null) //Hay una persona con el mismo nombre
        {
            $userStudentTmp = User::where('id', '=', $studentTmp->user)->first();

            //Buscar el id del a;o de la expo
            $expoStudent = expo::where('year', '=', $request->regStudentExpos)->first();

            if($expoStudent != null){
                //El a;o que se puso si esta en la bd de networking

                //Preguntar si existe el resgistro de alumno expo
                $studentExpoTmp = studentExpo::where('expo', '=', $expoStudent->id)->where('student', '=', $studentTmp->id)->first();

                if($studentExpoTmp != null){
                    //Se intenta registrar el mismo alumno en la misma expo
                    return response()->json([
                    'status' => 'Alumno previamente registrado',
                    'correo' => $userStudentTmp->email,
                    'contraseña' => $userStudentTmp->password
                    ]);
                }else{
                    //Mismo alumno dif expo
                    $studentExpo = new studentExpo();
                    $studentExpo->expo = $expoStudent->id; //2018
                    $studentExpo->student = $studentTmp->id;

                    if($studentExpo->save()) {
                        return response()->json([
                        'status' => 'Expo añadida al alumno',
                        'correo' => $userStudentTmp->email,
                        'contraseña' => $userStudentTmp->password
                        ]);
                    }
                    else {
                        return response()->json(['status' => 'Hubo un problema en el registro']);
                    }

                }

            }else{
                //Puso un a;o que no esta en la bd
                return response()->json(['status' => 'Hubo un problema en el registro.', 'msg' => 'El año no se ha registrado previamente, por favor contáctese con soporte.']);
            }


        }else{
            //Email
            $email = Str::lower(str_replace(" ", "",$request->regStudentName));

            $userStudent = new User();
            $userStudent->email = $email.'@net.working.com';
            $userStudent->password = Str::random(13);
            $userStudent->rol = 'student';

            //Se guarda usuario
            if($userStudent->save()){

                //Se crea un estudiante
                $student = new student();

                $student->fullName = $request->regStudentName;
                $student->user = $userStudent->id;
                $student->image = null;

                //Buscar el id del a;o de la expo
                $expoStudent = expo::where('year', '=', $request->regStudentExpos)->first();

                if($expoStudent != null){
                    //Se guarda estudiante
                    if($student->save()){


                        $studentExpo = new studentExpo();
                        $studentExpo->expo = $expoStudent->id; //2018
                        $studentExpo->student = $student->id;

                        if($studentExpo->save()) {
                            return response()->json([
                                'status' => 'Estudiante registrado',
                                'correo' => $userStudent->email,
                                'contraseña' => $userStudent->password
                            ]);
                        }
                        else {
                            return response()->json(['status' => 'Hubo un problema en el registro']);
                        }

                    } else {
                        return response()->json(['status' => 'Hubo un problema en el registro']);
                    }
                }else{
                    //Puso un a;o que no esta en la bd
                return response()->json(['status' => 'Hubo un problema en el registro.', 'msg' => 'El año no se ha registrado previamente, por favor contáctese con soporte.']);

                }

            } else {
                return response()->json(['status' => 'Hubo un problema en el registro']);
            }
        }



    }
}
