<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Strorage;

class MapelController extends Controller
{
    //
    public function index()
    {
        $mapels=Mapel::latest()->paginate(10);
        return view('mapel.index', compact('mapels'));
        
    }
    public function create()
    {
        return view('mapel.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_mapel'=>'required',
            'namaguru'=>'required'
        ]);
        DB::table('mapels')->insert([
            'nama_mapel'=>$request->nama_mapel,
            'namaguru'=>$request->namaguru
        ]);
        if(DB::table('mapels')){
            return redirect()->route('mapel.index')->with(['succes'=>'Data berhasil disimpan']);
        }else{
            return redirect ()->route('mapel.index')->with(['error'=>'Data gagal disimpan']);
        }    
    }
}
