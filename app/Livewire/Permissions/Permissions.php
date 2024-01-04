<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.permissions.permissions', [
            'permissions' => $permissions
        ]);
    }
}
