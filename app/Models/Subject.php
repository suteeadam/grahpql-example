<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model 
{
	
	public function user()
    {
        return $this->belongsToMany('App\Models\User', 'user_subject', 'subject_id', 'user_id')
            ->withTimestamps();
    }
}
