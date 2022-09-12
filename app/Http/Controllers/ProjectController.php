<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index(){
        if(Gate::allows('admin')){
            $projects = Project::latest()->filter(request(['searchProject']))->paginate(10)->withQueryString();
        }else{
            $projects= User::find(auth()->id())->projects()->latest()->filter(request(['searchProject']))->paginate(10);
        }
        
        return view('projects.index',compact('projects'));
    }
    public function create(){
        return view('projects.create');
    }
    
    public function show(Project $project){

        return view('projects.show', compact('project'));
    }

    public function store(Request $request){
       
        $attributes = $request->validate([
            'title' => ['required','max:50'],
            'status' => ['required'],
            'description' => ['required','max:255']
        ]);
        $attributes['created_by'] = auth()->user()->name;
        $project = Project::create($attributes);
        
        ProjectUser::create([
            'user_id'=>auth()->id(),
            'project_id'=>$project->id
        ]);
        return redirect()->route('projects')->with('status', 'Your Project has been created');
    }
    public function edit(Project $project){
         return view('projects.edit',compact('project'));
    }
    public function update(Request $request, Project $project){
        $attributes = $request->validate([
            'title' => ['required','max:50'],
            'status' => ['required'],
            'description' => ['required','max:255']
        ]);
        $project->update($attributes);
        return redirect()->route('projects');
    }
    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects');
   }
}
