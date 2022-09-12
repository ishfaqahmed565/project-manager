<x-app-layout>
    <x-slot name='header'>
        Edit Task: {{$task->title}}
    </x-slot>
    
    <form method='POST' action="{{route('updateTask',['project'=>$project->id,'task'=> $task->id])}}">
        @method('PATCH')
        @csrf
        <x-form.elements-layout :projectId='$project->id' :prevInfo='$task' header='Edit Task' />
    </form>

</x-app-layout>