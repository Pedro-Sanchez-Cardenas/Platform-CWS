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

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $paginationTheme = 'bootstrap';


    public function mount()
    {
        $this->company = Company::where('name', $this->parameterCompany)->first();
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo
        $this->model = Service::class;
    }

    public function render()
    {
        return view('livewire.service.index-service', [
            'services' => empty($this->search) ? Service::where('id', $this->company->services_id)->paginate(10) : $this->query(),
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
            $query = $query->orWhere($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }
}
