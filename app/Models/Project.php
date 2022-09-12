<?php

namespace App\Models;

use App\Models\Task;
use App\Models\User;
use App\Models\ProjectUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scopeFilter($query, array $filters){
        $query->when($filters['searchProject']??false, function($query,$searchProject){
            $query->where(fn($query)=>
                        $query
                        ->where('title', 'like', '%' . $searchProject . '%')
                        ->orWhere('description','like', '%' . $searchProject . '%')
                        ->orWhere('created_by','like', '%' . $searchProject . '%')
                        ->orWhere('status','like', '%' . $searchProject . '%')
                        ->orWhere('created_at','like', '%' . $searchProject . '%')
        );
        });
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
