<?php

namespace App\Http\Controllers\Murid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Siswa;
use App\Nilai;
use Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::where('user_id',  Auth::user() ? Auth::id() : "")->first();
        $nilai = Nilai::where('status', 'Remed')->where('siswa_id', $siswa ? $siswa->id: "")->count();
        $genap = Nilai::where('semester', 'Genap')->first();
         $ganjil = Nilai::where('semester', 'Ganjil')->first();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa ? $siswa->id: "")->count();
        $semester1 = Nilai::leftjoin('siswa', 'nilai.siswa_id', '=', 'siswa.id')
        ->leftjoin('mapel', 'nilai.mapel_id', '=', 'mapel.id')
        ->where('siswa.user_id', $siswa->user_id)
        ->select('nilai.nilai_mapel', 'mapel.nama_mapel')
        ->where('nilai.semester', '=', $genap ? $genap->semester : "")
        ->distinct() 
        ->get();
        // dd($semester1);
        $semester2 = Nilai::leftjoin('siswa', 'nilai.siswa_id', '=', 'siswa.id')
        ->leftjoin('mapel', 'nilai.mapel_id', '=', 'mapel.id')
          ->where('siswa.user_id', $siswa->user_id)

         ->select('nilai.nilai_mapel', 'mapel.nama_mapel')
        ->where('nilai.semester', '=', $ganjil ? $ganjil->semester : "")
        ->distinct() 
        ->get();
      
        $nama_mapel = $semester1->pluck('nama_mapel');
        $nilai_mapel = $semester1->pluck('nilai_mapel');
         $nama_mapel2 = $semester2->pluck('nama_mapel');
        $nilai_mapel2 = $semester2->pluck('nilai_mapel');
       
       
        return view('murid.index', compact('nilai','lulus','nama_mapel','nilai_mapel','nama_mapel2','nilai_mapel2'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}