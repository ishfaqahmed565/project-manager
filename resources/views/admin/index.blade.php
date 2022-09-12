
<x-app-layout>
 
    <x-slot name="header">
        
            {{ __('Admin Users') }}
        
    </x-slot>
    
   
<div class="container mx-auto px-4 sm:px-8 max-w-xl">
    <div class="py-8">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="text-2xl leading-tight">
                Users
            </h2>
            <div class="text-end">
                <form class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                    <div class=" relative ">
                    <input value="{{request('searchUser')}}" type="text" name="searchUser" id="&quot;form-subscribe-Filter" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="name"/>
                                    </div>
                                    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg" >
                                        Filter
                                    </button>
                    </form>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    User
                                </th>
                                
                              
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                 E-mail
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Role
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$user->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$user->email}}
                                        </p>
                                    </td>
                                    
                                
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex justify-center">
                                                        <div
                                                            x-data="{
                                                                open: false,
                                                                toggle() {
                                                                    if (this.open) {
                                                                        return this.close()
                                                                    }

                                                                    this.$refs.button.focus()

                                                                    this.open = true
                                                                },
                                                                close(focusAfter) {
                                                                    if (! this.open) return

                                                                    this.open = false

                                                                    focusAfter && focusAfter.focus()
                                                                }
                                                            }"
                                                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                                                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                                            x-id="['dropdown-button']"
                                                            class="relative"
                                                        >
                                                            <!-- Button -->
                                                            <button
                                                                x-ref="button"
                                                                x-on:click="toggle()"
                                                                :aria-expanded="open"
                                                                :aria-controls="$id('dropdown-button')"
                                                                type="button"
                                                                class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow"
                                                            >
                                                                {{$user->role->role}}

                                                                <!-- Heroicon: chevron-down -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>

                                                            <!-- Panel -->
                                                            <div
                                                                x-ref="panel"
                                                                x-show="open"
                                                                x-transition.origin.top.left
                                                                x-on:click.outside="close($refs.button)"
                                                                :id="$id('dropdown-button')"
                                                                style="display: none;"
                                                                class="relative z-50 left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                                                            >
                                                            <form method='POST' action="{{route('updateUser',[$user->id])}}" id="changeRole-form" >
                                                                             @method('PATCH')
                                                                            @csrf
                                                                @foreach(App\Models\Role::all() as $role)
                                                                <div class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 ">
                                                                    
                                                                            
                                                                            <button type='submit' name='role_id' value="{{$role->id}}"   >
                                                                                {{$role->role}}
                                                                            </button>
                                                                    
                                                                </div>
                                                                @endforeach
                                                            </form>

                                                                <div class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 text-red-500">
                                                                    <form method='POST'  action="{{route('deleteUser',[$user->id])}}" >
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button  onclick="return confirm('Are you sure you want to delete this user?')"  >
                                                                                Delete
                                                                            </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class=" bg-white py-5 flex  justify-center px-4">
                                    <div class='w-full'>
                                                    {{isset($users) ? $users->links() : ''}}
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
