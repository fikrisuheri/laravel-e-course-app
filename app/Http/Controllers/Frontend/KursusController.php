<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    protected $course;
    public function __construct(Course $course)
    {
        $this->course = new BaseRepository($course);
    }

    public function show($mitraSlug,$courseSlug)
    {
        try {
            $data['course'] = $this->course->Query()->where('slug',$courseSlug)->first();
            return view('frontend.course.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
