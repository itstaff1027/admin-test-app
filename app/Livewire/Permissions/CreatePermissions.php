<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class CreatePermissions extends Component
{

    public $name = '';

    protected $rules = [
        'name' => 'required|min:3'
    ];

    public function store(Request $request){
        $this->validate();
        
        Permission::create(['name' => $this->name]);

        return redirect('/permissions');
    }

    public function render()
    {
        return view('livewire.permissions.create-permissions');
    }
}
