<?php

namespace App\Http\Livewire\Plants;

use Livewire\Component;

use App\Models\MembraneType;
use App\Models\PolishFiltersType;

class CreateTrains extends Component
{
    // variables conectadas a Alpinejs
    public $trainIndex = [];

    public function render()
    {
        return view('livewire.plants.create-trains', [
            'membranesTypes' => MembraneType::all(),
            'polishFiltersTypes' => PolishFiltersType::all()
        ]);
    }
}
