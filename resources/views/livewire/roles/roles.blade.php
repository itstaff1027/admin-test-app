<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="w-full flex items-end justify-end p-2">
                    <a class="text-black p-2 rounded-xl bg-emerald-600 font-bold" href="{{ route('admin.create-role') }}">Create Role</a>
                </div>
                
                <table class="table-fixed w-full border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-600">Name</th>
                            <th class="border border-slate-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td  class="border border-slate-600">{{ $role->name }}</td>
                                <td  class="border border-slate-600 p-2">
                                    <a href="{{ route('admin.edit-role', $role->id) }}" class="p-1 rounded-md bg-blue-400 hover:bg-blue-600">Edit</a>
                                    <a href="{{ route('admin.delete-role', $role->id) }}" class="p-1 rounded-md bg-red-600 hover:bg-red-700">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
