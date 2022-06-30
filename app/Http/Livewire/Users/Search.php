<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Search extends Component
{
    
    public $search;
    public $model;
    public $fields; 
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name', 'email','phone_1','phone_2','companies_id',];
        // Si queremos añadir relaciones para evitar el N+1
        $this->relationships = ['relationship'];
        //Definimos el modelo 
        $this->model = '\App\Models\User;';
    }

    public function render()
    {
        return view('livewire.users.search', [
            'results' => empty($this->search) ? collect() : $this->query(),
            'users' => User::all(),
            'services' => Service::all(),
            'roles' => Role::all(),
            'company' => Company::all()
        ]);
    }

    public function resetInput()
    {
        $this->reset('search');
    }

    private function query()
    {
        return $this->whereConditions()
            // Si no queremos añadir relationships lo quitamos...
            ->with($this->relationships)
            // Por ejemplo...
            ->take(10)
            ->get();
    }

    private function whereConditions()
    {
        $query = $this->model::Query();

        foreach($this->fields as $field) {
            $query = $query->orWhere($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }
}
  