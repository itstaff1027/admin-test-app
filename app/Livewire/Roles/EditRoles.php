<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRoles extends Component
{
    public $roles_id;
    public $name='';
    public $rawData;
    public $permission_name;
    public $role_permission;

    public function mount($id){
        $this->roles_id = $id;
        $this->rawData = Role::find($id);
    }

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function revokePermission(Permission $permission){
        $role = $this->rawData;
        $role_id = $role->id;

        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return redirect('/roles');
        }

        return redirect('/roles');
    }

    public function update(){
        $this->validate();
        
        $this->rawData->name = $this->name;
        // dd($this->rawData);
        $this->rawData->save();

        return redirect('/roles');

    }

    public function givePermission(){
        $role = Role::find($this->roles_id); // Retrieve the role using the role ID
    
        if(!$role) {
            // If the role doesn't exist, return an error message
            return redirect('/roles')->with('error', 'Role not found');
        }
    
        if(!$this->permission_name) {
            // If the permission name is not set, return an error message
            return redirect('/roles')->with('error', 'Permission name not provided');
        }
    
        $permission = Permission::findByName($this->permission_name); // Retrieve the permission using the permission name
    
        if(!$permission) {
            // If the permission doesn't exist, return an error message
            return redirect('/roles')->with('error', 'Permission not found');
        }
    
        if($role->hasPermissionTo($this->permission_name)){
            // If the role already has the permission, return a success message
            return redirect('/roles')->with('success', 'Permission already assigned to role');
        }
    
        $role->givePermissionTo($this->permission_name); // Assign the permission to the role
    
        return redirect('/roles')->with('success', 'Permission assigned successfully');
    }

    public function render()
    {
        $role = Role::find($this->roles_id);
        $permissions = Permission::all();
    
        if($role) {
            $role_name = $role->name;
            $role_id = $role->id;
            $role_permissions = $role->permissions; // Retrieve all the role's permissions
            // dd($role_permissions);s
            return view('livewire.roles.edit-roles', compact('role_name', 'role_id', 'permissions', 'role_permissions'));
        }
    
        return view('livewire.roles.edit-roles')->with('error', 'Role not found');
    }
    
    
    
}
