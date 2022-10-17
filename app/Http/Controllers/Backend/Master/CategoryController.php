<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Master\CategoryRequest;
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
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        return view('backend.master.category.create');
    }

    public function edit($id)
    {
        try {
            $data['category'] = $this->category->find($id);
            return view('backend.master.category.edit',compact('data'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
      
    }

    public function update(CategoryRequest $request,$id)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->category->update($id,$request->all());
            return redirect()->route('backend.master.category.index')->with('success',__('message.update'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(CategoryRequest $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->category->store($request->all());
            return redirect()->route('backend.master.category.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->category->delete($id);
            return redirect()->route('backend.master.category.index')->with('success',__('message.delete'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
