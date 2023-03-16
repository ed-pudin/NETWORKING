<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\company;

class ProfileCompany extends Component
{
    public $company;
    public $idCompany;
    public $oldLinkedin;

    public function render()
    {
        return view('livewire.profile-company');
    }

    public function saveEditing(){

        $student = company::find($this->idCompany);
        $student->linkedin = $this->oldLinkedin;

        if($student->save()){
            $this->emit('saveEditingSuccess');
        }else{
            $this->emit('saveEditingFail');
        }
    }

    public function editLinkedin(){
        $this->emit('editLinkedin');
    }

    public function stopEditing(){
        $this->emit('stopEditing');
    }
}
