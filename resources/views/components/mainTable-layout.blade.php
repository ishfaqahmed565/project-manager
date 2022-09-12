@props(['header','dataSet'=>null,'projectId'=> null,'addRoute','showRoute','editRoute','deleteRoute'])

<div class="py-12">
          <div class="flex flex-col gap-4 justify-items-center content-center flex-grow">
                   
                    
                 <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
                    <div class="py-8">
                    <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                        <h2 class="text-2xl leading-tight">
                           
                               {{$header}}
                           
                        </h2>
                        <div class="text-end">
                            <form class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                                <div class=" relative ">
                                    <input value="{{$projectId?request('searchTask'):request('searchProject')}}" type="text" name="{{$projectId?'searchTask':'searchProject'}}" id="&quot;form-subscribe-Filter" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="search"/>
                                    </div>
                                    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg" >
                                        Filter
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-10 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Title
                                            </th>
                                            <th scope="col" class="hide-on-mobile px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Created By
                                            </th>
                                            <th scope="col" class="hide-on-mobile px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Created at
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                status
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                
                                                @can($projectId?'adminORmanager':'admin')
                                                    <a href={{route($addRoute,$projectId)}} class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                        Add+
                                                    </a>
                                                @endcan
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    @if($dataSet!==null)
                                        @foreach ($dataSet as $dataElem)
                                        <tbody>
                                            
                                            <tr class='hover:bg-indigo-700' >
                                                <td class=" px-5 py-5 border-b border-gray-200 bg-white text-sm" x-data={} @click="window.location.href='{{route($showRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id])}}'">
                                                    <div class="flex items-center">
                                                        <div class="ml-1">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                
                                                                   
                                                                    {{$dataElem->title}}
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="hide-on-mobile px-5 py-5 border-b border-gray-200 bg-white text-sm" x-data={} @click="window.location.href='{{route($showRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id])}}'">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$dataElem->created_by}}
                                                    </p>
                                                </td>
                                                <td class="hide-on-mobile px-5 py-5 border-b border-gray-200 bg-white text-sm" x-data={} @click="window.location.href='{{route($showRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id])}}'">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$dataElem->created_at}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" x-data={} @click="window.location.href='{{route($showRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id])}}'">
                                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                        </span>
                                                        <span class="relative">
                                                        {{$dataElem->status}}
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    
                                                    {{--<a href="{{route($editRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id] )}}" class="text-indigo-600 hover:text-indigo-900">
                                                        Edit
                                                    </a>--}}
                                                    @can($projectId?'adminORmanager':'admin')
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
                                                                Options

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
                                                                
                                                                <a href="{{route($editRoute,isset($projectId) ? ['project'=>$projectId,'task'=>$dataElem->id] : [$dataElem->id] )}}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                                                    Edit 
                                                                </a>

                                                                <div class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 text-red-500">
                                                                <form method='POST' action="{{route($deleteRoute, isset($projectId) ? ['project'=>$projectId,'task'=> $dataElem->id ] : [$dataElem->id])}}" >
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button  onclick="return confirm('Are you sure you want to delete this?')"  >
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    @endif
                                </table>
            
            
                                <div class=" bg-white py-5 flex  justify-center px-4">
                                    <div class='w-full'>
                                                    {{isset($dataSet) ? $dataSet->links() : ''}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
    </div>