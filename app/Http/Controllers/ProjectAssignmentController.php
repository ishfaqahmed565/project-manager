<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;


class ProjectAssignmentController extends Controller
{
    public function store(Request $request, Project $project){
        
        $attributes = $this->validate($request,['project-assignment' => 'required']);
        
        foreach ($attributes['project-assignment'] as $user) {
            ProjectUser::create([
                'user_id'=>$user,
                'project_id'=>$project->id
            ]);
        }
        return redirect(route('showProject',[$project->id]));
        
    }
    public function destroy(User $user){
        
        $projectUser = ProjectUser::where('user_id',$user->id);
        $projectUser->delete();
        return redirect()->back();
    }
}
