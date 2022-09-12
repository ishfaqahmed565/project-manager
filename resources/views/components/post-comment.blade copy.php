@props(['comment'])
<x-panel>
    

    <div>
        <header class='mb-4'>
            <h3 class='font-bold'>
                {{$comment->author->name}}
            </h3>

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