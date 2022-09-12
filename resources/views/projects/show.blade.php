<x-app-layout>
@if(Gate::allows('adminOrassignee',[$project->id]))
    <x-slot name="header">
        
        Project: {{ $project->title }}
        
    </x-slot>
    <div class='flex flex-col items-center'>
        
            <x-details-card :data='$project' />
            
            <div class='mt-8'>
                <h2 class="text-2xl leading-tight">
                                
                                 Members
                            
                </h2>
                <table class="table p-4 bg-white shadow rounded-lg mt-4">
                            <thead>
                                <tr>
                                    
                                    <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                        Name
                                    </th>
                                    <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                        Role
                                    </th>
                                    <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                    @can('adminORmanager')
                                        <section class="flex flex-wrap p-4 h-full items-center">

                                            <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" @click="showModal = true">New Member</button>

                                            <!--Overlay-->
                                            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'fixed inset-0 z-10 flex items-center justify-center': showModal }">
                                                <!--Dialog-->
                                                <div class="bg-gray-100 w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" >

                                                    <!--Title-->
                                                    <div class="flex justify-between items-center pb-3">
                                                        <p class="text-2xl font-bold">Assign Project</p>
                                                        <div class="cursor-pointer z-50" @click="showModal = false">
                                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <!-- content -->
                                                    <form action="/projects/{{$project->id}}/project-assignment-create"  method='POST' id='project-assignment'>
                                                        @csrf
                                                        
                                                    <x-project-assignment />
                                            
                                                    </form>

                                                    <!--Footer-->
                                                    <div class="flex justify-end pt-2">
                                                        <button x-data={} class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" @click="document.querySelector('#project-assignment').submit()" >Add</button>
                                                        <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" @click="showModal = false">Close</button>
                                                    </div>


                                                </div>
                                                <!--/Dialog -->
                                            </div><!-- /Overlay -->

                                        </section>
                                    @endCan
                                    
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($project->users->count() > 0)    
                                    @foreach ($project->users as $user)
                                    
                                        <x-assignTbBody :member='$user'/>
                                    
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
            
        </div>
       
        <x-mainTable-layout header='Tasks' :projectId='$project->id' :dataSet='$project->tasks()->latest()->filter(request(["searchTask"]))->paginate(10)->withQueryString()'  addRoute='createTask' showRoute='showTask' editRoute='editTask' deleteRoute='deleteTask'/> 
    </div>
        @else
        <x-slot name="header">
            
            You are not a member of this project.
            
        </x-slot>
    @endif
    
    
</x-app-layout>