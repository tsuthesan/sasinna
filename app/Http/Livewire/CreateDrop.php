<?php

namespace App\Http\Livewire;

use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateDrop extends Component
{
    public $product_groups;

    protected $listeners = ['refreshComponent' => 'mount']; /*Note: activating the refresh*/


    public function mount(){
        $this->product_groups = AttributeValue::where("atb_id","=",1)->get();
    }
    public function render()
    {
//        $product_groups = DB::table('attribute_values')
//            ->where('atb_id', 1)
//            ->get();
        return view('livewire.create-drop');
    }
}
