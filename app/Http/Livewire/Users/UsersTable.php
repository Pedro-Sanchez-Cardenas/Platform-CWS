<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use Livewire\Component;
use App\Models\User;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class UsersTable extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $userId, $name, $email, $phone_1, $phone_2, $password, $companies_id, $service, $role;
    public $search;
    public $model;
    public $fields;
    public $relationships;
   
    public function delete(User $user)
    {
       $user->delete();
    }

    public function show($id)
    {
        $user = User::find($id);
      
      
    }
    
    protected $rules = [
        'name' => 'required|string|max:30',
        'email' =>'required|email',
        'phone_1' => 'required|min:10|max:10',
        'password' => 'required',
        'companies_id' => 'required',
        'service' => 'required',
        'role' => 'required',
        
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_1 = $user->phone_1;
        $this->phone_2 = $user->phone_2;
        $this->password = $user->password;
        $this->role = Role::where('name', $user->getRoleNames()->first())->first()->id;
        $this->companies_id = $user->companies_id;
        $this->service = $user->services_id;
      
    }
    

    public function update()
    {
        $this->validate();

        $user = User::find($this->userId);
        $user->update([
            'name'        => $this->name,
            'email' => $this->email,
            'phone_1'    => $this->phone_1,
            'phone_2'       => $this->phone_2,
            'companies_id'       => $this->companies_id,
            'service'    => $this->service,
            'role'    => $this->role
        ]);
        $this->emit('success-alert2');
        //$this->reset();
    }
 
    

    public function render()
    {
        return view('livewire.users.users-table', [
            'users' => User::paginate(8),
            'services' => Service::all(),
            'roles' => Role::all(),
            'company' => Company::all()
        ]);
    }

}







