<?php

namespace App\Http\Livewire\Operation\Plants;

use Livewire\Component;

use App\Models\BillingPeriod;
use App\Models\Company;
use App\Models\Country;
use App\Models\Currency;
use App\Models\MembraneActiveArea;
use App\Models\Plant;
use App\Models\PlantContract;
use App\Models\PlantType;
use App\Models\PolishFilterType;
use App\Models\Train;
use App\Models\User;

class Trains extends Component
{
    // variables conectadas a Alpinejs
    public $trainIndex = [];

    public function render()
    {
        return view('livewire.operation.plants.trains', [

            'plantTypes' => PlantType::all(),
            'countries' => Country::all(),
            'currencies' => Currency::all(),
            'attendants' => User::role('Operator')->get(),
            'managers' => User::role('Manager')->get(),
            'membranesActiveArea' => MembraneActiveArea::all(),
            'polishFilterTypes' => PolishFilterType::all(),
            'companies' => Company::all(),

        ]);
    }
}