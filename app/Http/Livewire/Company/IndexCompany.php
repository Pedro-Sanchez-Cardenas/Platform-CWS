<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class IndexCompany extends Component
{
    use WithPagination;

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
        $this->model = Company::class;
    }

    public function render()
    {
        return view('livewire.company.index-company', [
            'companies' => empty($this->search) ? Company::paginate(10) : $this->query(),
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
