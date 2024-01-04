<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class DeleteRoles extends Component
{

    public $role_id;
    public $rawData;

    public function mount($id){
        $this->role_id = $id;
        $this->rawData = Role::find($id);
    }

    public function delete(){
        $role = Role::find($this->role_id);
        $role->delete();

        return redirect('/roles');
    }

    public function render()
    {
        $raw_data = $this->rawData;

        return view('livewire.roles.delete-roles', [
            'role_id' => $raw_data->id,
            'role_name' => $raw_data->name
        ]);
    }
}
