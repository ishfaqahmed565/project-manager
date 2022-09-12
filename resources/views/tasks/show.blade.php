<x-app-layout>
    
    <x-slot name='header'>
        <h2 class='font-bold' >
            <a href="{{route('showProject',[$project->id])}}">
            <i class="fa-regular fa-circle-left">

        </i>
                Project: {{$project->title}}
            </a>
        </h2>
        <hr>
        <div class='text-sm ml-6 mt-2 font-thin'>
        <i class="fa-regular fa-square-check">

        </i>
            Task: {{$task->title}}
</div> 
    </x-slot>
    <div class='flex flex-col items-center'>
        <x-details-card :data='$task'/>
        <div class='w-7/12'>
            <x-add-comment-form :task='$task'/>

            @foreach($task->comments->sortByDesc('created_at') as $comment)
                    <x-post-comment :comment="$comment" />
            @endforeach
        </div>
    </div>

</x-app-layout>