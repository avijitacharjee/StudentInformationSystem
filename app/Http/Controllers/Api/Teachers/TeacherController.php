<?php

namespace App\Http\Controllers\Api\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Notifications\verifyEmail;
use App\Models\Teacher;
use App\Models\PostFor;
use App\Models\Student;
use App\Models\User;

class TeacherController extends Controller
{
    public function posts(Request $request)
    {

        $user_id = $request->user()->id;
        $teacher = Teacher::where('user_id',$user_id)->first();
        $student = Student::where('user_id', $user_id)->first();
        $posts = PostFor::with('post')
        ->where('all', 1)
        ->orWhere('student', 1)
        ->orWhere('semester', $student->semester)
            ->orWhere('batch', $student->batch)
            ->get()
        ->orWhere('teacher', 1)
        ->orWhere('department', $teacher->departmant)
            ->get();

        return response()->json([
            'data' => $posts,
            'error' => 'false',
        ]);
    }

    //Profile Update
    public function profile(Request $request)
    {
        $user_id = $request->user()->id;
        $teacher = Teacher::with('user')->where('user_id', $user_id)->first();
        return response()->json([
            'data' => $teacher,
            'error' => 'false',
        ]);
    }


    public function update(Request $request)
    {
        $user_id = $request->user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'phone_number' => 'required|max:15|min:11',
            'email' => 'email|required',
            'password' => 'required|min:8|confirmed',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation Failed',
                'errors' => $validator->errors()->all(),
                'data' => $request->input(),
                'error' => 'true',
            ]);
        }



        $user = User::find($user_id);
        $user->update([
            'phone_number' => $request->phone_number,
            'email' => strtolower(trim($request->email)),
            'password' => bcrypt($request->password),
        ]);

        $teacher = Teacher::with('user')->where('user_id', $user_id)->first();
        $teacher->update([
            'name' => $request->name,
            'department' => $request->department,
            


        ]);

        return response()->json([
            'data' => $teacher,
            'error' => 'false',
        ]);
    }

}
