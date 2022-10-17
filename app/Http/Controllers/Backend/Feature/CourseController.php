<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\CourseDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(CourseDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.course.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
