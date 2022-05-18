<?php

namespace App\Http\Livewire\Service;

use App\Models\Company;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class IndexService extends Component
{
    use WithPagination;

    public $parameterCompany;
    public $company;

    public $search;
    public $model;
    public $fields;
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        $this->company = Company::where('name', $this->parameterCompany)->with('services')->first();
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo
        $this->model = Service::class;
    }

    public function render()
    {
        return view('livewire.service.index-service', [
            'company' => empty($this->search) ? $this->company : $this->query(),
        ]);
    }

    private function query()
    {
        $query = $this->model::Query();

        foreach ($this->fields as $field) {
            $query = Service::where($field, 'like', '%' . $this->search . '%')->get();
        }

        return $query;
    }
}
