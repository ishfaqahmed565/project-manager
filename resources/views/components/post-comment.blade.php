@props(['comment'])
<x-panel > 
    <div>
        <header class='mb-4'>
            <div class='flex justify-between'>
            <h3 class='font-bold'>
                {{$comment->author->name}}
            </h3>
            <form action="{{route('deleteComment',[$comment->id])}}" method='post' id='deleteComment'>
                @csrf
                @method('DELETE')
                <i x-data={} @click="document.querySelector('#deleteComment').submit()" class="fa-sharp fa-solid fa-trash"></i>
            </form>
            </div>
            

            <p class='text-xs'>
                Posted
                <time>
            {{$comment->created_at->diffForHumans()}}
                </time>
            </p>
        </header>
        <p>
            {{$comment->body}}
        </p>
        
    </div>
    </x-panel>