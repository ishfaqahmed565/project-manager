<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Task $task){
        request()->validate([
            'body'=>'required'
        ]);
        $task->comments()->create([
            'user_id'=> request()->user()->id,
            'body'=>request('body')
        ]);
        return back();
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return back();
    }
}
