<?php

namespace App\Http\Livewire\Plants;

use Livewire\Component;

use App\Models\MembraneType;
use App\Models\Plant;
use App\Models\PolishFiltersType;
use App\Models\Train;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateTrains extends Component
{
    // variables conectadas a Alpinejs
    public $train;

    protected $listeners = ['createTrain'];

    public function mount()
    {
        $this->train['status'] = true;
    }

    protected function rules()
    {
        return [
            // Trains
            'train' => ['min:1|max:5|array:capacity,tds,boosters,multimediaFiltersQuantity,polishFilterTypes,polishFilterQuantity,membraneActiveArea,membraneQuantity'], // We validate the array
            'train.capacity' => ['required', 'integer', 'min:0'],
            'train.tds' => ['required', 'integer', 'min:0'],
            'train.boosters' => ['required', 'integer'],
            'train.multimediaFiltersQuantity' => ['required', 'integer'],
            'train.polishFilterTypes' => ['required', 'integer'],
            'train.polishFilterQuantity' => ['required', 'integer'],
            'train.membraneActiveArea' => ['required', 'integer'],
            'train.membraneQuantity' => ['required', 'integer'],
            'train.status' => ['sometimes']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createTrain(Plant $plant)
    {
        try {
            DB::transaction(function () use ($plant) {
                Train::create([
                    'plants_id' => $plant->id,
                    'capacity' => $this->train['capacity'],
                    'boosters_quantity' => $this->train['boosters'],
                    'multimedia_filters_quantity' => $this->train['multimediaFiltersQuantity'],
                    'tds' => $this->train['tds'],
                    'status' => $this->train['status'],
                    'type' => 'Train',
                    'polish_filters_types_id' => $this->train['polishFilterTypes'],
                    'polish_filters_quantity' => $this->train['polishFilterQuantity'],
                    'membrane_types_id' => $this->train['membraneActiveArea'],
                    'membrane_elements' => $this->train['membraneQuantity'],
                    'user_created_at' => Auth::id(),
                ]);
            });
            $this->emit('create-trains-success');
        } catch (Exception $e) {
            $this->emit('create-trains-error');
        }
    }

    public function render()
    {
        return view('livewire.plants.create-trains', [
            'membranesTypes' => MembraneType::all(),
            'polishFiltersTypes' => PolishFiltersType::all()
        ]);
    }
}
