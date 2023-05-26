<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Livewire\Component;

class CreateGroup extends Component
{
    public $showModal;
    public $data;
    public $show;
    public $name ;
    public $description;
    public $atb_id;

    protected function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'atb_id' => 'required',

        ];
    }

    protected $listeners = ['showModal' => 'showModal'];
//    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->atb_id = '';

    }

    public function doSomething() {
        // Do Something With Your Modal
        $validatedData = $this->validate();

        AttributeValue::create($validatedData);
        $this->emit('refreshComponent');

        // Close Modal After Logic
        $this->doClose();
        $this->resetInputFields();git init

    }
    public function showModal() {


        $this->doShow();
    }

    public function render()
    {
        $attributes= Attribute::all();
        return view('livewire.create-group',compact('attributes'));
    }
}
