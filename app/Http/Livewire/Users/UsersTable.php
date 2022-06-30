<?php

namespace App\Http\Livewire\Users;

use App\Models\Company;
use Livewire\Component;
use App\Models\User;
use App\Models\Service;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class UsersTable extends Component
{
    
    public $user, $userId, $name, $email, $phone_1, $phone_2, $password, $companies_id, $service, $role;
    
   
    public function destroy($id)
    {
        if ($id) {
            $user = User::where('id', $id);
            $user->delete();
        }
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
        $this->companies_id = $user->companies_id;
        $this->service = $user->service_id;
      
    }
    

    public function update()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:255',
            'phone_1' => 'required',
            //'phone_2' => 'required',
            'password' => 'required',
            'companies_id' => 'required',
            'service' => 'required',
            'role' => 'required'
            
        ]);

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
        $this->dispatchBrowserEvent('successAlert');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.users.users-table', [
            'users' => User::all(),
            'services' => Service::all(),
            'roles' => Role::all(),
            'company' => Company::all()
        ]);
    }
}




