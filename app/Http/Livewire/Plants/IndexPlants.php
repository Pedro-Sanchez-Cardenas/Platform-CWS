<?php

namespace App\Http\Livewire\Plants;

use App\Models\Plant;
use App\Models\Company;
use App\Models\ProductWater;
use Carbon\Carbon;
use Livewire\Component;

class IndexPlants extends Component
{
    // Parameters
    public $company;

    // Data requerida por la vista
    public Company $companyData;
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
        $this->companyData = Company::where('name', $this->company)->first();
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo
        $this->model = Plant::class;
    }

    public function checkForParameters ($plantId) {
        $parameters = ProductWater::where('plants_id', $plantId)->whereDate('created_at', Carbon::now()->format('y-m-d'))->first();

        if($parameters){
            $this->emit('alertExistParameters', $plantId);
        }else{
            return redirect()->route('companies.services.plants.parameters.create', [$this->company, $this->service, $plantId]);
        }
    }

    private function query()
    {
        return $this->whereConditions()
            // Si no queremos añadir relationships lo quitamos...
            //->with($this->relationships)
            // Por ejemplo...
            ->paginate(10);
    }

    private function whereConditions()
    {
        $query = $this->model::Query();

        foreach ($this->fields as $field) {
            $query = $query->where('companies_id', $this->companyData->id)->Where($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }

    public function render()
    {
        return view('livewire.plants.index-plants', [
            'plants' => empty($this->search) ? Plant::where('companies_id', $this->companyData->id)->paginate(10) : $this->query()
        ]);
    }
}
