<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use Livewire\Component;
use App\Models\User;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class FormUsers extends Component
{

    public $product_id, $name, $email, $phone_1, $phone_2, $password, $companies_id, $service, $role;



    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_1' => 'required',
            'password' => 'required',
            'companies_id' => 'required',
            'service' => 'required',
            'role' => 'required',


        ]);

        User::create([
            'name'        => $this->name,
            'email' => $this->email,
            'phone_1'    => $this->phone_1,
            'phone_2'       => $this->phone_2,
            'password'       => $this->password,
            'companies_id'       => $this->companies_id,
            'service'       => $this->service,
            'role'       => $this->role,

        ]);

        $this->reset();
     
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:255',
            'phone_1' => 'required',
            'password' => 'required',
            'companies_id' => 'required',
            'service' => 'required',
            'role' => 'required'
        ]);

        $user = User::find($this->id);
        $company = Company::find($this->id);
        $services = Service::find($this->id);
        $roles = Role::find($this->id);
        $user->update([
            'name'        => $this->name,
            'email' => $this->email,
            'phone_1'    => $this->phone_1,
            'phone_2'       => $this->phone_2,
            'companies_id'       => $this->companies_id,
            'service'    => $this->service

        ]);
        $this->reset();
    }
   
    public function render()
    {
        return view('livewire.users.form-users', [
            'users' => User::all(),
            'services' => Service::all(),
            'roles' => Role::all(),
            'company' => Company::all()
        ]);
    }
}
