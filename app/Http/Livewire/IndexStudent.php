<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\companyInterests;
use App\Models\company;

class IndexStudent extends Component
{
    protected $listeners = ['deleteFilter' => 'delete'];

    public $allInterests;
    public $companies;
    public $searchTxt = "";

    public function render()
    {
        $this->emit('load');

        return view('livewire.index-student');
    }

    public function addFilter($txt, $index){
        $this->searchTxt = $txt;
        $this->emit('filter', $txt, $index);
        $this->search();
    }

    public function search(){

        $companyInterestsTemp = companyInterests::select('company_interests.company')
                                    ->join('interests', 'interests.id', '=', 'company_interests.interests')
                                    ->where('interests.name','like', '%'.$this->searchTxt.'%')->distinct()->get();

        $companyTemp = array();

        for($i= 0; $i< count($companyInterestsTemp); $i++){

            array_push($companyTemp, company::where('id', '=', $companyInterestsTemp[$i]->company)->first());
        }

        $this->companies = $companyTemp;

        $this->dispatchBrowserEvent('contentChanged');
    }

    public function delete(){
        $this->searchTxt = "";
        $this->search();
    }

}
