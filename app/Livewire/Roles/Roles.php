<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public function render()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('livewire.roles.roles', [
            'roles' => $roles
        ]);
    }
}
