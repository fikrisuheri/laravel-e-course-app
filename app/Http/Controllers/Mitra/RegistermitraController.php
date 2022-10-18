<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Feature\Mitra;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Str;
class RegistermitraController extends Controller
{
    protected $mitra;

    public function __construct(Mitra $mitra)
    {
        $this->mitra = new BaseRepository($mitra);
    }

    public function register()
    {
        if(auth()->user()->isMitra() == true){
            return redirect()->route('frontend.user.dashboard');
        }
        return view('mitra.register.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:mitras,name',
            'logo' => 'required|mimes:png,jpg,jpeg',
            'description' => 'required|string',
        ]);

        try {
            $request->merge(['user_id' => auth()->user()->id]);
            $request->merge(['slug' => Str::slug($request->name)]);
            $request->merge(['join_at' => '-']);
            $this->mitra->store($request->all(),true,['logo'],'mitra/logo');
            return redirect()->route('frontend.user.dashboard')->with('success',__('message.mitra_register_success'));
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

  
}
