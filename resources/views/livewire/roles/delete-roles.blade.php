<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="w-full flex items-center justify-center p-2">
                    <h1 class="text-white text-center p-2 rounded-xl bg-red-300 font-bold" >Are you sure you want to delete this Role : "{{ $role_name }}"?</h1>
                </div>
                <div class="flex justify-center items-center w-full">
                    <div class="flex justify-between w-1/2">
                        <form wire:submit.prevent='delete' class="w-full">
                            @csrf
                            <button type="submit" class="p-2 rounded-xl bg-red-500 w-full hover:bg-red-600">YES</button>
                            
                        </form>
                        <a href="{{ route('admin.roles') }}" class="p-2 rounded-xl bg-emerald-500 w-full text-center hover:bg-emerald-600" >NO</a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
