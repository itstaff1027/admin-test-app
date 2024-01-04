<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermissions extends Component
{
    public $permissions_id;
    public $name='';
    public $rawData;

    public function mount($id){
        $this->permissions_id = $id;
        $this->rawData = Permission::find($id);
    }

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function update(){
        $this->validate();
        
        $this->rawData->name = $this->name;
        // dd($this->rawData);
        $this->rawData->save();

        return redirect('/permissions');

    }
    public function render()
    {
        $permission_name = Permission::find($this->permissions_id);
        return view('livewire.permissions.edit-permissions',[
            'permission_id' => $this->permissions_id,
            'permission_name' => $permission_name->name
        ]);
    }
}
