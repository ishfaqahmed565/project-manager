<x-app-layout>
    <x-slot name='header'>
        Create project
    </x-slot>
    
<form method='POST' action='/projects/create' class="flex ">
@csrf
    <div class=" px-5 py-10 m-auto mt-10 bg-white rounded-lg shadow ">
        <div class="mb-6 text-3xl font-light text-center text-gray-800">
            Project Details !
        </div>
        <div class="grid max-w-xl grid-cols-2 gap-4 m-auto">
            <div class="col-span-2 lg:col-span-1">
                <div class=" relative">
                        <input type="text" id="title" name='title' 
                        class=" rounded-lg  flex-1 appearance-none
                        border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 
                        placeholder-gray-400 shadow-sm text-base focus:outline-none 
                        focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        placeholder="Title" value="{{old('title')}}"   />
                        @error('title')
                        <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                        @endError
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1">
                    <div class=" relative ">
                        
                       
                        <select id="status"
                        name="status"
                        class=" rounded-lg  flex-1 appearance-none border border-gray-300
                         w-full py-2 px-4 bg-white text-gray-400 placeholder-gray-400 
                         shadow-sm text-base 
                         focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                         value={{old('status')}} >
                        <option class='hidden' value='' >Choose a status</option>
                        <option value="active" {{ old('status') === 'active'? 'selected':''}}>Active</option>
                        <option value="finished" {{ old('status') === 'finished'? 'selected':''}}>Finished</option>
                        
                        </select>
                        @error('status')
                        <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                        @endError
                    </div>
                    </div>
                    <div class="col-span-2">
                        <label class="text-gray-400 ml-1 pb-2" for="description">
                            Description
                        </label>
                        <textarea class="flex-1 appearance-none
                         border border-gray-300 w-full py-2 px-4
                          bg-white text-gray-700 placeholder-gray-400 rounded-lg 
                          text-base focus:outline-none focus:ring-2 
                          focus:ring-purple-600 focus:border-transparent" 
                          id="description" placeholder="Enter your comment"
                           name="description" rows="5" cols="40">{{old('description')}}</textarea>
                        @error('description')
                            <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                        @endError
                    </div>
                    <div class="col-span-2 text-right">
                        <button type='submit' class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </form>

</x-app-layout>