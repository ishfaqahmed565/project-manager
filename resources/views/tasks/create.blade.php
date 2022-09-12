<x-app-layout>
    <x-slot name='header'>
        Create a Task!
    </x-slot>
    
<form method='POST' action="{{route('storeTask',$project->id)}}" >
    @csrf
    <x-form.elements-layout header='Task Details!' />
</form>

</x-app-layout>