<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UsersTable extends Component
{
    public $view = 'users.form-users';
    public $users, $product_id, $name, $email, $phone_1, $phone_2, $password, $companies_id;
    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
    public function save(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'required',
            'password' => 'required',
            'companies_id' => 'required'
        ]);

        User::create([
            'name'        => $this->name,
            'email' => $this->email,
            'phone_1'    => $this->phone_1,
            'phone_2'       => $this->phone_2,
            'password'       => $this->password,
            'companies_id'       => $this->companies_id
        ]);
        $this->reset();
    }
    public function edit($id){
        $users = User::find($id);
        $this->name = $users->name;
        $this->email = $users->email;
        $this->phone = $users->phone_1;
        $this->phone_2 = $users->phone_2;
        $this->companies_id = $users->companies_id;
     

    }
    public function update(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'required',
            'password' => 'required',
            'companies_id' => 'required'
        ]);

        $users = User::find($this->id);
        $users->update([
            'name'        => $this->name,
            'email' => $this->email,
            'phone_1'    => $this->phone_1,
            'phone_2'       => $this->phone_2,
            'companies_id'       => $this->companies_id
        ]);
        $this->reset();
    }
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.users-table');
    }
   
   
    
}