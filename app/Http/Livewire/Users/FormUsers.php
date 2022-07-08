<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class FormUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id, $name, $email, $phone_1, $phone_2, $password, $companies_id, $services_id, $role;

    protected $rules = [
        'name' => 'required|string|max:30',
        'email' =>'required|email|unique:users,email,',
        'phone_1' => 'required|min:10|max:10',
        'password' => 'required',
        'companies_id' => 'required',
        'services_id' => 'required',
        'role' => 'required'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'password' => Hash::make($this->password),
            'companies_id' => $this->companies_id,
            'services_id' => $this->services_id
        ])->assignRole($this->role);
        $this->reset();
        $this->emit('success-alert');
    }

    public function render()
    {
        return view('livewire.users.form-users', [
            'services' => Service::all(),
            'roles' => Role::all(),
            'company' => Company::all()
        ]);
    }
}
