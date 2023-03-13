<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\interests;
use App\Models\companyInterests;

class InterestingAreas extends Component
{
    public $interests;
    public $idCompany;
    public $isSetting = false;

    public function render()
    {
        return view('livewire.interesting-areas');
    }

    public function initialAreas(){

        $this->isSetting = false;
        $this->interests = companyInterests::join('interests', 'interests.id', '=', 'company_interests.interests')->where('company', '=', $this->idCompany)->get();
    }

    public function configAreas(){
        //Cambio los intereses que se muestran
        $this->interests = interests::all();
        $this->emit('backFnc');

        $this->isSetting = true;
    }

    public function updateRegister($id){

        $companyInt = new companyInterests();
        $companyInt->interests = $id;
        $companyInt->company = $this->idCompany;

        $companyInt->save();

        $this->initialAreas();
    }

    public function deleteRegister($id){

        $interests = companyInterests::where('interests', '=', $id)->where('company', '=', $this->idCompany)->first();
        $interests->delete();

        $this->initialAreas();
    }
}
