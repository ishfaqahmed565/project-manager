
<x-app-layout>

    <x-slot name="header">
        
        {{ __('My Projects') }}
        
    </x-slot>

    <x-mainTable-layout header='Projects' :dataSet='$projects' addRoute='createProject' showRoute='showProject' editRoute='editProject' deleteRoute='deleteProject'/>


</x-app-layout>
