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
                               <input type='text' class="w-full mt-2 rounded-xl text-black hover:border hover:border-emerald-500" placeholder="{{ $permission_name }}" wire:model="name" />
                               @error('name')
                                  <span class="text-red-400 text-sm">{{ $message }}</span>
                               @enderror
                            </td>
                         </tr>
                         <tr>
                            <td>
                               <button type="submit" class="w-full rounded-xl text-white bg-emerald-500 hover:bg-emerald-600 ease-in">Save</button>
                            </td>
                          </tr>
                      </tbody>
                   </table>
                </form>
            </div>
        </div>
    </div>
 </div>
 
 