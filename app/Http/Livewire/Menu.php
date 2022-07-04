<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.menu',[
            'companies' => Company::with('services')->get(),
        ]);
    }
}
