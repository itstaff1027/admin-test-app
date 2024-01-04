<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRoles extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function store(){
        $this->validate();
        
        Role::create(['name' => $this->name]);

        return redirect('/roles');
    }
    public function render()
    {
        return view('livewire.roles.create-roles');
    }
}
