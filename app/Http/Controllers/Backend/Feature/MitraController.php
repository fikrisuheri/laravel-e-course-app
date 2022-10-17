<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\MitraDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index(MitraDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.mitra.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
