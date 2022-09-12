<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scopeFilter($query, array $filters){
        $query->when($filters['searchTask']??false, function($query,$searchTask){
            $query->where(fn($query)=>
                        $query
                        ->where('title', 'like', '%' . $searchTask . '%')
                        ->orWhere('description','like', '%' . $searchTask . '%')
                        ->orWhere('created_by','like', '%' . $searchTask . '%')
                        ->orWhere('status','like', '%' . $searchTask . '%')
                        ->orWhere('created_at','like', '%' . $searchTask . '%')
        );
        });
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
