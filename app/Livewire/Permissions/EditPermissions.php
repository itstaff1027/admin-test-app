<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditPermissions extends Component
{
    public $permissions_id;
    public $name='';
    public $rawData;

    public $role_name;
    public $permission_roles;

    public function mount($id){
        $this->permissions_id = $id;
        $this->rawData = Permission::find($id);
    }

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function removeRole(Role $role){
        $permission = $this->rawData;

        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return redirect('/permissions');
        }

        return redirect('/permissions');
    }

    public function update(){
        $this->validate();
        
        $this->rawData->name = $this->name;
        // dd($this->rawData);
        $this->rawData->save();

        return redirect('/permissions');

    }

    public function assignRole(){
        $permission = Permission::find($this->permissions_id); // Retrieve the permission using the permission ID
    
        if(!$permission) {
            // If the permission doesn't exist, return an error message
            return redirect('/permissions')->with('error', 'permission not found');
        }
    
        if(!$this->role_name) {
            // If the permission name is not set, return an error message
            return redirect('/permissions')->with('error', 'Permission name not provided');
        }
    
        $role = Role::findByName($this->role_name); // Retrieve the permission using the permission name
    
        if(!$role) {
            // If the permission doesn't exist, return an error message
            return redirect('/permissions')->with('error', 'Permission not found');
        }
    
        if($permission->hasRole($this->role_name)){
            // If the permission already has the permission, return a success message
            return redirect('/permissions')->with('success', 'Permission already assigned to permission');
        }
    
        $permission->assignRole($this->role_name); // Assign the permission to the permission
    
        return redirect('/permissions')->with('success', 'Permission assigned successfully');
    }

    public function render()
    {
        $permission= Permission::find($this->permissions_id);
        $roles = Role::all();
        
        if($permission) {
            $permission_name = $permission->name;
            $permission_id = $permission->id;
            $this->permission_roles = $permission->roles; // Retrieve all the role's permissions
            // dd($permission_roles[0]->name);
            // dd($roles);
            return view('livewire.permissions.edit-permissions', compact('permission_name', 'permission_id', 'roles'));
        }

        return view('livewire.permissions.edit-permissions')->with('error', 'Role not found');
    }
}