<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

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
}
