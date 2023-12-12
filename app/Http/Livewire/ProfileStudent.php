<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\student;

class ProfileStudent extends Component
{
    public $student;
    public $user;
    public $idStudent;
    public $oldLinkedin;
    public $idUser;
    public $oldPassword;

    public function render()
    {
        return view('livewire.profile-student');
    }

    public function saveEditing(){
        $student = student::find($this->idStudent);
        $student->linkedin = $this->oldLinkedin;

        if($student->save()){
            $this->emit('saveEditingSuccess');
        }else{
            $this->emit('saveEditingFail');
        }
    }
    
    public function savePassword(){
        $userStudent = new User();
        $user = User::find($this->idUser);
        $user->password = $this->oldPassword;
        
        if($user->save()){
            $this->emit('saveEditingSuccess');
        }else{
            $this->emit('saveEditingFail');
        }
    }

    public function editLinkedin(){
        $this->emit('editLinkedin');
    }
    
    public function editPassword(){
        $this->emit('editPassword');
    }

    public function stopEditing(){
        $this->emit('stopEditing');
    }
    public function editImage(){
        $this->emit('editImage');
    }

}
