<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = new BaseRepository($category);
    }

    public function index(CategoryDataTable $datatable)
    {
        try {
            return $datatable->render('backend.master.category.index');
        } catch (\Throwable $th) {
            
        }
    }

    public function create()
    {
        return view('backend.master.category.create');
    }

    public function store(Request $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->category->store($request->all());
            return redirect()->route('backend.master.category.index')->with('success','Okey');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
