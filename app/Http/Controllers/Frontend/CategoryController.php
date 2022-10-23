<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Master\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        try {
            $category = Category::where('slug',$slug)->first();
            $data['course'] = Course::where('categorie_id',$category->id)->get();
            return view('frontend.category.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
