<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="w-full flex items-end justify-end p-2">
                    Edit Permission
                </div>

                <form wire:submit.prevent='update' method='PUT' class="flex flex-row">
                    <table class="table-fixed w-full border-collapse text-left">
                        <thead>
                            <tr class="border-b-2 border-slate-500">
                                <th>Edit Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type='text'
                                        class="w-full mt-2 rounded-xl text-black hover:border hover:border-emerald-500"
                                        placeholder="{{ $permission_name }}" wire:model="name" />
                                    @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit"
                                        class="w-full rounded-xl text-white bg-emerald-500 hover:bg-emerald-600 ease-in">Save</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <div class="flex flex-col mt-3 w-full">
                    <h2 class="font-bold">Edit Permission : roles</h2>
                    <div class=" p-2 flex">
                        @if ($permission_roles)
                            @foreach ($permission_roles as $permission_role)
                                <form wire:submit.prevent="removeRole({{ $permission_role->id }})" class="mr-2">
                                    <button type="submit"
                                        wire:confirm='"Are you sure you want to delete this Role : permission?'
                                        class="font-bold p-2 rounded-xl bg-red-600">
                                        {{ $permission_role->name }}
                                    </button>
                                </form>
                            @endforeach
                        @endif
                    </div>



                    <form wire:submit.prevent="assignRole"
                        action="{{ route('admin.permission.roles', $permissions_id) }}"
                        class=" flex flex-col mt-3 w-full">
                        @csrf
                        <h4>Roles</h4>
                        <select class="text-black w-1/2 rounded-xl" wire:model="role_name">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit"
                            class="w-1/2 rounded-xl text-white bg-emerald-500 hover:bg-emerald-600 ease-in">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
