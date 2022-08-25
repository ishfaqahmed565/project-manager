<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects= Project::latest()->get();
        return view('projects.index',compact('projects'));
    }
    public function create(){
        return view('projects.create');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'title' => ['required','max:20'],
            'status' => ['required'],
            'description' => ['required','max:255']
        ]);
        $attributes['created_by'] = auth()->user()->name;
        Project::create($attributes);
        return redirect()->route('projects')->with('status', 'Your Project has been created');
    }
    public function edit(){
        return view('projects.edit');
    }
}
