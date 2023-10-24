<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;

    public function samples()
    {
        return $this->belongsToMany(Project::class, 'genre_project', 'genre_id', 'project_id')
            ->withTimestamps(); // If you want to track timestamps
    }

}
