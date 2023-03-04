<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\interests;
use App\Models\student;
use App\Models\studentInterests;

class IndexCompany extends Component
{
    public $students;
    public $allInterests;
    public $searchTxt = "";

    public function render()
    {
        $this->emit('load');

        return view('livewire.index-company');
    }
    public function addFilter($txt, $index){
        $this->searchTxt = $txt;
        $this->emit('filter', $txt, $index);
        $this->search();
    }

    public function search(){

        $studentsInterestsTemp = studentInterests::select('student_interests.student')
                                    ->join('interests', 'interests.id', '=', 'student_interests.interests')
                                    ->where('interests.name','like', '%'.$this->searchTxt.'%')->distinct()->get();

        $studentsTemp = array();

        for($i= 0; $i< count($studentsInterestsTemp); $i++){

            array_push($studentsTemp, student::where('id', '=', $studentsInterestsTemp[$i]->student)->first());
        }

        $this->students = $studentsTemp;

        $this->dispatchBrowserEvent('contentChanged');
    }
}
