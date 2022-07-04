<?php

namespace App\Http\Livewire\Plants;

use App\Models\Plant;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductWater;
use Carbon\Carbon;
use Livewire\Component;


class IndexPlants extends Component
{
    // Parameters
    public $company;
    public $service;

    // Compenentes del Search
    public $search;
    public $model;
    public $fields;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo
        $this->model = Plant::class;
    }

    public function checkForParameters($plantId)
    {
        $parameters = ProductWater::where('plants_id', $plantId)->whereDate('created_at', Carbon::now()->format('y-m-d'))->first();

        if ($parameters) {
            $this->emit('alertExistParameters', $plantId);
        } else {
            return redirect()->route('companies.services.plants.parameters.create', [$this->company, $this->service, $plantId]);
        }
    }

    private function query()
    {
        $query = $this->model::Query();

        foreach ($this->fields as $field) {
            $query = $query->where('companies_id', $this->company)->where($field, 'like', '%' . $this->search . '%');
        }

        return $query->paginate(10);
    }

    public function render()
    {
        return view('livewire.plants.index-plants', [
            'plants' => empty($this->search) ? Plant::where('companies_id', $this->company)->get() : $this->query()
        ]);
    }
}
