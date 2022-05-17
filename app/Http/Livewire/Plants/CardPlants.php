<?php

namespace App\Http\Livewire\Plants;

use App\Models\Plant;
use App\Models\Company;
use Livewire\Component;

class CardPlants extends Component
{
    public $parameterCompany;
    public $company;
    public $search;
    public $model;
    public $fields;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->company = Company::where('name', $this->parameterCompany)->first();
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo
        $this->model = PLant::class;
    }

    public function render()
    {
        return view('livewire.plants.card-plants', [
            'plants' => empty($this->search) ? Plant::where('companies_id', $this->company->id)->paginate(10) : $this->query()
        ]);
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
            $query = $query->where('companies_id', $this->company->id)->Where($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }
}
