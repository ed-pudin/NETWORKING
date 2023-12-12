<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\interests;
use App\Models\studentInterests;

class InterestingAreasStudents extends Component
{
    public $interests;
    public $idStudent;
    public $isSetting = false;

    public function render()
    {
        return view('livewire.interesting-areas-students');
    }

    public function initialAreas(){

        $this->isSetting = false;
        $this->interests = studentInterests::join('interests', 'interests.id', '=', 'student_interests.interests')->where('student', '=', $this->idStudent)->get();
    }

    public function configAreas(){
        //Cambio los intereses que se muestran
        $this->interests = interests::all();
        $this->emit('backFnc');

        $this->isSetting = true;
    }

    public function updateRegister($id){

        $studentInt = new studentInterests();
        $studentInt->interests = $id;
        $studentInt->student = $this->idStudent;
        
        $interests = interests::where('id', '=', $id)->first();

        if($interests == null)
        {
            session()->flash("status","Hubo un problema editando el interés.");
            return redirect()->back();
        }
        
        $studentInt->save();

        $this->initialAreas();
    }

    public function deleteRegister($id){

        $interests = studentInterests::where('interests', '=', $id)->where('student', '=', $this->idStudent)->first();
        if($interests == null)
        {
            session()->flash("status","Hubo un problema editando el interés.");
            return redirect()->back();
        }
        $interests->delete();

        $this->initialAreas();
    }
}
