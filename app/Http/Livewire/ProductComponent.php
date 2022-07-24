<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductComponent extends Component
{

    public function loadAllData()
    {
        
        return [
        ];
    }
    public function render()
    {
        return view('livewire.product-component', $this->loadAllData())->layout('layouts.base');
    }
}
