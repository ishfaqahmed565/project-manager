<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Project $project){
        return view('tasks.create',compact('project'));
    }
    public function store(Project $project){
        
        $attributes = request()->validate([
            'title' => ['required','max:50'],
            'status' => ['required'],
            'description' => ['required','max:255']
        ]);
        $attributes['created_by'] = auth()->user()->name;
        $project->tasks()->create($attributes);
        return redirect()->route('showProject',[$project->id]);
    }
    public function edit(Project $project, Task $task){
        
        return view('tasks.edit',compact('project', 'task'));
    }
    public function update(Request $request, Project $project, Task $task){
        
        $attributes = $request->validate([
            'title' => ['required','max:50'],
            'status' => ['required'],
            'description' => ['required','max:255']
        ]);
        $task->update($attributes);
        
        return redirect()->route('showProject',[$project->id]);
    }
    public function destroy(Project $project, Task $task){
        $task->delete();
        return redirect()->route('showProject',[$project->id]);
   }
   public function show(Project $project, Task $task){
        return view('tasks.show',compact('project', 'task'));
   }
}
