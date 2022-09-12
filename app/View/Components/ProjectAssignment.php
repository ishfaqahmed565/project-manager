<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\ProjectUser;
use Illuminate\View\Component;

class ProjectAssignment extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {   
        $users = User::all();
        $projectUsers = ProjectUser::all();
        $members = [];
        foreach($users as $user){
            $truth = true;
            foreach($projectUsers as $projectUser){
                if($user->id === $projectUser->user_id){
                    $truth = false;
                }
            }
            if($truth){
                array_push($members,$user);
            }
        }
        return view('components.project-assignment',compact('members'));
    }
}
