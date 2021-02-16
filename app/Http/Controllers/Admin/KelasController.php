<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\Jurusan;
use App\Siswa;
use PDF, DB;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.kelas.index', compact('kelas','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
         $jurusan = Jurusan::all();
        return view('admin.kelas.tambah', compact("kelas","jurusan"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::where('nama_kelas', $request->nama_kelas)->first();

    
        if(!$kelas){
            Kelas::create([
                'nama_kelas' => $request->nama_kelas,
            ]);
            return redirect('admin/kelas')->with('sukses','Data Kelas telah ditambahkan');
        }else{
            return redirect('admin/kelas')->with('destroy',' Data Kelas sudah ada');
        }
       
    }
    public function AddJurusan(Request $request){
        $jurusan = Jurusan::where('nama_jurusan', $request->nama_jurusan)->first();
         if(!$jurusan){
            Jurusan::create([
                'nama_jurusan' => $request->nama_jurusan,
            ]);
            return redirect('admin/kelas')->with('sukses','Data Kelas & Jurusan telah ditambahkan');
        }else{
                return redirect('admin/kelas')->with('destroy',' Data Jurusan sudah ada');
        }

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
    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'nama_jurusan' => $request->nama_jurusan,
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return redirect('admin/kelas')->with('update', 'Data Kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect('admin/kelas')->with('destroy','Data Kelas berhasil dihapus');
    }
    public function destroyJurusan(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect('admin/kelas')->with('destroy','Data Jurusan berhasil dihapus');
    }
    public function cetak(){
        $kelas = Kelas::join('kelas_jurusan', 'kelas.id', '=', 'kelas_jurusan.kelas_id')
        ->join('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->join('siswa', 'kelas_jurusan.siswa_id', '=', 'siswa.id')
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan', DB::raw('count(siswa.id) as jumlah_siswa'))
        ->groupby('kelas.id','jurusan.id')
        ->orderby('kelas.nama_kelas', 'asc')
        ->get();

            $pdf = PDF::loadView('admin.kelas.cetak',compact('kelas'));
            $pdf->setPaper('a4','landscape');
    
            return $pdf->stream();
    }
}