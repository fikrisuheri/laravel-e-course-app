<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\CourseMitraRequest;
use App\Models\Feature\Course;
use App\Models\Feature\CourseDetail;
use App\Models\Master\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Str;
class CoursemitraController extends Controller
{
    protected $category,$course,$courseDetail;

    public function __construct(Category $category,Course $course,CourseDetail $courseDetail)
    {
        $this->category = new BaseRepository($category);
        $this->course = new BaseRepository($course);
        $this->courseDetail = new BaseRepository($courseDetail);
    }

    public function index()
    {
        return view('mitra.course.index');
    }

    public function create()
    {
        try {
            $data['category'] = $this->category->get();
            return view('mitra.course.create',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(CourseMitraRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $request->merge(['mitra_id' => auth()->user()->mitra->id]);
            $course = $this->course->store($request->except(['detail_link','detail_name','duration']),true,['image'],'mitra/course');
            $index = 0;
            foreach($request->detail_name as $detail){
                preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $request->detail_link[$index], $link);
                $detailData = [
                    'course_id' => $course->id,
                    'name' => $detail,
                    'number' => $index + 1,
                    'duration' => $request->duration[$index],
                    'link' => $link[0][0],
                ];
                $this->courseDetail->store($detailData);
                $index++;
            }

            return redirect()->route('frontend.mitra.course.index')->with('success',__('message.mitra_course_store'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
