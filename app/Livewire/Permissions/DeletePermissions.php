<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class DeletePermissions extends Component
{
    public $permission_id;
    public $rawData;

    public function mount($id){
        $this->permission_id = $id;
        $this->rawData = Permission::find($id);
    }

    public function delete(){
        $permission = Permission::find($this->permission_id);
        $permission->delete();

        return redirect('/permissions');
    }

    public function render()
    {
        $raw_data = $this->rawData;
        return view('livewire.permissions.delete-permissions', [
            'permission_id' => $raw_data->id,
            'permission_name' => $raw_data->name
        ]);
    }
}
