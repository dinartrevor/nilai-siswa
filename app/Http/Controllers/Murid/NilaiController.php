<?php

namespace App\Http\Controllers\Murid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Nilai;
use Auth, DB;
use PDF;
class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::where('user_id', Auth::user() ? Auth::id() : "")->first();
        $nilai = Nilai::where('siswa_id', $siswa ? $siswa->id : "" )->get();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->first();
 
        return view('murid.histori-nilai', compact('nilai','nilai_rata'));
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
    public function export_pdf()
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->get();
        $remed = Nilai::where('status', 'Remed')->where('siswa_id', $siswa->id)->count();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa->id)->count();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->first();
           $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        $pdf = PDF::loadView('murid.cetak-nilai',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
    }
    public function ganjil()
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->where('semester','ganjil')->get();
        $remed = Nilai::where('status', 'Remed')->where('siswa_id', $siswa->id)->where('semester','ganjil')->count();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa->id)->where('semester','ganjil')->count();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->where('semester','ganjil')
        ->first();
           $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        $pdf = PDF::loadView('murid.cetak-nilai-ganjil',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
    }
     public function genap()
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->where('semester','genap')->get();
        $remed = Nilai::where('status', 'Remed')->where('siswa_id', $siswa->id)->where('semester','genap')->count();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa->id)->where('semester','genap')->count();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->where('semester','genap')
        ->first();
           $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        $pdf = PDF::loadView('murid.cetak-nilai-genap',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
    }
    public function rangking(){
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.id as kelas_id', 'jurusan.id as jurusan_id')
        ->first();
         $siswa = Siswa::leftjoin('nilai', 'siswa.id', '=', 'nilai.siswa_id')
        ->leftjoin('kelas_jurusan', 'siswa.id','=','kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id','=','kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id','=','jurusan.id')
        ->select('siswa.id as siswa_id','siswa.nis','siswa.nama','kelas.nama_kelas','jurusan.nama_jurusan','nilai.id as nilai_id',DB::raw('AVG(nilai.nilai_mapel)  as rata_rata_nilai'))
        ->orderby('rata_rata_nilai','desc')
        ->where('kelas.id', $murid_kelas_jurusan->kelas_id)
        ->where('jurusan.id', $murid_kelas_jurusan->jurusan_id)
        ->groupby('siswa.id')
        ->get();
        set_time_limit(300);
        $pdf = PDF::loadView('murid.rangking',compact('siswa'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream();
     
    }
}