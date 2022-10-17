<?php

namespace App\Http\Controllers\Backend\Master;

use App\DataTables\Master\UserDatatable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = new BaseRepository($user);
    }

    public function index(UserDatatable $datatable)
    {
        try {
            return $datatable->render('backend.master.user.index');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        return view('backend.master.user.create');
    }

    public function edit($id)
    {
        try {
            $data['user'] = $this->user->find($id);
            return view('backend.master.user.edit',compact('data'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
      
    }

    public function update(Request $request,$id)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->user->update($id,$request->all());
            return redirect()->route('backend.master.user.index')->with('success',__('message.update'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->merge(['slug' => Str::slug($request->name)]);
            $this->user->store($request->all());
            return redirect()->route('backend.master.user.index')->with('success',__('message.store'));
        } catch (\Throwable $th) {
           return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->user->delete($id);
            return redirect()->route('backend.master.user.index')->with('success',__('message.delete'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
