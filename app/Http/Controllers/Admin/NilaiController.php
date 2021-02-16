<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Mapel;
use App\Nilai;
use App\Guru;
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
        }elseif ($nilai_mapel >= $kkm) {
            $status="Lulus";
        }else{
            $status="kosong";
        }
        if ($murid->nilai()->where('mapel_id', $request->mapel_id)->where('semester',$request->semester)->exists()) {
         return redirect('admin/nilai/detail/'.$murid->id)->with('error', 'Data Mata Pelajaran Sudah ada');
        }else{
            $nilai = Nilai::create([
                'siswa_id' => $murid->id,
                'mapel_id' => $request->mapel_id,
                'guru_id' => $request->guru_id,
                'status' => $status,
                'nilai_mapel' => $nilai_mapel,
                'kkm' => $kkm,
                'semester' => $request->semester
            ]);
    
            return redirect('admin/nilai/detail/'.$murid->id)->with('sukses', 'Data Nilai telah di tambah');
        }



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
        $guru = Guru::all();
        $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $murid->id)
        ->first();
        $nilai = Nilai::where('siswa_id', $murid->id)
        ->get();
        $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $murid->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        return view('admin.nilai.detail', compact('murid', 'nilai', 'mapel','guru','nilai_rata','murid_kelas_jurusan'));
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
    public function guruMapel(Request $request){
        // dd();
        $sub = Guru::where('mapel_id', '=', $request->mapel_id)->get();
        return response()->json($sub);
    }

    public function cetak_nilai($murid){
        $siswa = Siswa::where('id', $murid)->first();
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
        $pdf = PDF::loadView('admin.nilai.cetak-nilai',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
           
    }
    public function cetak_nilai_ganjil($murid){
        $siswa = Siswa::where('id', $murid)->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->where('semester', 'ganjil')->get();
        $remed = Nilai::where('status', 'Remed')->where('siswa_id', $siswa->id)->where('semester', 'ganjil')->count();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa->id)->where('semester', 'ganjil')->count();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->where('semester', 'ganjil')
        ->first();
         $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        $pdf = PDF::loadView('admin.nilai.cetak-nilai-ganjil',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
           
    }
    public function cetak_nilai_genap($murid){
        $siswa = Siswa::where('id', $murid)->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->where('semester', 'genap')->get();
        $remed = Nilai::where('status', 'Remed')->where('siswa_id', $siswa->id)->where('semester', 'genap')->count();
        $lulus = Nilai::where('status', 'Lulus')->where('siswa_id', $siswa->id)->where('semester', 'genap')->count();
         $nilai_rata = Nilai::select(DB::raw('AVG(nilai_mapel)  as rata_rata_nilai'))
        ->where('siswa_id', $siswa->id)
        ->where('semester', 'genap')
        ->first();
         $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $siswa->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        $pdf = PDF::loadView('admin.nilai.cetak-nilai-genap',compact('siswa', 'nilai','remed','lulus','nilai_rata','murid_kelas_jurusan'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
           
    }
}