<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'status',
    ];
<<<<<<< HEAD
=======


    public function post_for(){
        return $this->hasOne('App\Models\PostFor');
    }
>>>>>>> ed08f7556e02cae2425eaef1bf7f0578014681b5
}
