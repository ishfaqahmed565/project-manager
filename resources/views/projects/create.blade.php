<x-app-layout>
    <x-slot name='header'>
        Create project
    </x-slot>
    
<form method='POST' action='{{route('storeProject')}}' >
    @csrf
    <x-form.elements-layout header='Project Details!' />
</form>

</x-app-layout>