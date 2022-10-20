<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\CourseDetail;
use App\Models\Feature\UserCourse;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class UsercourseController extends Controller
{
    protected $userCourse,$courseDetail;
    public function __construct(UserCourse $userCourse,CourseDetail $courseDetail)
    {
        $this->userCourse = new BaseRepository($userCourse);
        $this->courseDetail = new BaseRepository($courseDetail);
    }

    public function index()
    {
        try {
            $data['userCourse'] = $this->userCourse->Query()->where('user_id',auth()->user()->id)->get();
            return view('user.course.index',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function learn($id,$progress)
    {
        try {
            $data['userCourse'] = $this->userCourse->find($id);
            $data['current_course'] = $this->courseDetail->Query()->where(['number' => $progress,'course_id' => $data['userCourse']['course_id']])->first();
            if($progress > $data['userCourse']['progress'] && $progress <= $data['userCourse']['course']['total_item']){
                $data['userCourse']['progress'] = $progress;
                $data['userCourse']->save();
            }
            return view('user.course.learn',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
