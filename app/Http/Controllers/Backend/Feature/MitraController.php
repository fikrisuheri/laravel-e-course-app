<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\MitraDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Mitra;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    protected $mitra;

    public function __construct(Mitra $mitra)
    {
        $this->mitra = new BaseRepository($mitra);
    }

    public function index(MitraDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.mitra.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function accept(Request $request)
    {
        try {
            $this->mitra->update($request->mitra_id,['is_approved' => 1]);
            return back()->with('success',__('message.mitra_register_accept'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
