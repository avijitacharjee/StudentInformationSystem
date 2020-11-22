<?php

namespace App\Http\Controllers\Api\CRs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Notifications\verifyEmail;
use App\Models\CR;
use App\Models\Post;
use App\Models\PostFor;
class CrController extends Controller
{
    public function all(Request $requst)
    {
        $crs = CR::all();
        return response()->json([
            'data'=>[
                'crs' => $crs
            ],
            'message'=>'successfully retrieved'
        ]);
    }
    public function createPost(Request $requst){
        $post = new Post();
        $post->user_id = $requst->user_id;
        $post->content = $requst->content;
        $post->status = 0;
        if($post->save()){
            $data = Post::latest()->first();
            $post_id = $data->id;
            $postFor = new PostFor();
            $postFor->post_id = $post_id;
            $postFor->all = $requst->all;
            $postFor->student = $requst->student;
            $postFor->semester = $requst->semester;
            $postFor->teacher = $requst->teacher;
            $postFor->cr = $requst->cr;
            $postFor->batch = $requst->batch;
            $postFor->course_id = $requst->course_id;
            if($postFor->save()){
                return response()->json([
                    'data'=>[
                        'postFor' => $postFor
                    ],
                    'message'=>'successfully Added'
                ]);
            }
        }
    }
}