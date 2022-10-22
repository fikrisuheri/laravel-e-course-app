<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\CourseDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $course;
    public function __construct(Course $course)
    {
        $this->course = new BaseRepository($course);
    }

    public function index(CourseDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.course.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
        $data['course'] = $this->course->find($id);
        return view('backend.feature.course.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
