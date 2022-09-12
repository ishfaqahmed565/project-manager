<x-app-layout>
    <x-slot name='header'>
        Edit Project: {{$project->title}}
    </x-slot>
    
    <form method='POST' action="{{route('updateProject',['project'=>$project->id])}}">
        @csrf
        @method('PATCH')
        <x-form.elements-layout :prevInfo='$project'  header='Edit Project' />
    </form>

</x-app-layout>