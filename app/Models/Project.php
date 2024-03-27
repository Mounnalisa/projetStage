<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date'];

   
     // Define a many-to-many relationship with the Task model.
     
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    
     //Define a many-to-many relationship with the User model.
     
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
