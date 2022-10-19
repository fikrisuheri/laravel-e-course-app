<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    protected $course;
    public function __construct(Course $course)
    {
        $this->course = new BaseRepository($course);
    }
    public function index()
    {
       try {
            $data['course'] = $this->course->Query()->limit(8)->get();
            return view('frontend.welcome',compact('data'));
       }catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
       }
    }
}
