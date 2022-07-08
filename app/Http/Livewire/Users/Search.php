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
    

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name'];
        //Definimos el modelo 
        $this->model = User::class;
    }

    public function render()
    {
        return view('livewire.search', [
            'users' => empty($this->search) ? User::paginate(10) : $this->query(),
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
            //->with($this->relationships)
            // Por ejemplo...
            //->take(10)
            //->get();
            ->paginate(10);
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