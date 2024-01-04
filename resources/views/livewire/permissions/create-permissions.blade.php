<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="w-full flex items-end justify-end p-2">
                    <h1>Create Permission</h1>
                </div>
                
                <form wire:submit.prevent="store" method='POST' class="w-1/2">
                    @csrf
                    <label>Name</label>
                    <input type='text' id='name' name='name' class="w-full rounded-xl hover:border-2 hover:border-emerald-800 text-black" wire:model='name' />
                    @error('name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="pt-2">
                        <button type="submit" class="rounded-xl bg-emerald-500 p-2" >Save</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
