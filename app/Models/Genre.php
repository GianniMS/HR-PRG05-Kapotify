<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;

    public function samples()
    {
        return $this->belongsToMany(Sample::class, 'genre_sample', 'genre_id', 'sample_id')
            ->withTimestamps(); // If you want to track timestamps
    }

}
