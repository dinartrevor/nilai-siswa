<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Mapel;
use App\Nilai;
class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        return view('admin.nilai.index', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Siswa $murid)
    {
        $nilai_mapel= $request->nilai_mapel;
        $kkm = 70;
        $status ="";
        if($nilai_mapel < $kkm){
            $status="Remed";
        }elseif ($nilai_mapel > $kkm) {
            $status="Lulus";
        }else{
            $status="kosong";
        }
        if ($murid->nilai()->where('mapel_id', $request->mapel_id)->exists()) {
         return redirect('admin/nilai/detail/'.$murid->id)->with('error', 'Data Mata Pelajaran Sudah ada');
        }


        $nilai = Nilai::create([
            'siswa_id' => $murid->id,
            'mapel_id' => $request->mapel_id,
            'status' => $status,
            'nilai_mapel' => $nilai_mapel,
            'kkm' => $kkm,
            'semester' => $request->semester
        ]);

        return redirect('admin/nilai/detail/'.$murid->id)->with('sukses', 'Data Nilai telah di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $murid)
    {
        $mapel = Mapel::all();
        $nilai = Nilai::where('siswa_id', $murid->id)->get();
        return view('admin.nilai.detail', compact('murid', 'nilai', 'mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai, Siswa $murid)
    {
        $nilai->delete();

        return redirect('admin/nilai/detail/'.$murid->id)->with('delete', 'Data Nilai telah dihapus');
    }
}
