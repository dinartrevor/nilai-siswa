<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kelas;
use App\User;
use App\Jurusan;
use App\Rangking;
use App\KelasJurusan;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use PDF;
use DB;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = Siswa::all();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
          $asal_sekolah = Siswa::groupby('asal_sekolah')->get();
        // dd($asal_sekolah);
        return view('admin.siswa.index', compact('murid','kelas','jurusan','asal_sekolah'));
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
        return view('admin.siswa.tambah', compact('kelas', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'nama'=>'min:5|required',
            'nis'=>'min:5|required|unique:siswa',
            'email' => 'required|unique:users',
        ]);
         DB::beginTransaction();
        try {
        $user= User::create([

            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
            'level' => "siswa"
        ]);
       $siswa =  Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'tahun_ajaran'=> $request->tahun_ajaran,
            'user_id' => $user->id
        ]);
      
        KelasJurusan::create(['siswa_id' => $siswa['id'],
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan]);
        // Mail::to($request->email)->send(new MailNotify());
         DB::commit();

        return redirect('/admin/murid')->with('sukses', 'Data Siswa Telah ditambahkan');
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $murid)
    {
        $murid = Siswa::where('id',$murid->id)->first();
        $murid_kelas_jurusan = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->where('siswa.id', $murid->id)
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan')
        ->first();
        return view('admin.siswa.detail', compact('murid','murid_kelas_jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $murid)
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $kelasJurusan = KelasJurusan::where('siswa_id',$murid->id)->select(['siswa_id','kelas_id', 'jurusan_id'])->get();
        return view('admin.siswa.edit', compact('murid', 'kelas','kelasJurusan','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $murid)
    {
        $users = User::where('id', $murid->user_id)->first();

        $murid->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'kelas_id' => $request->jurusan,
            'kelas_id' => $request->tahun_ajaran,
            'asal_sekolah' => $request->asal_sekolah
        ]);

   
        $users->name = $request->nama;
        $users->email = $request->email;
        $users->password = bcrypt($request->nis);
        $users->level = "siswa";
        $users->save();
        DB::delete('delete from kelas_jurusan where siswa_id = ?',[$murid->id]);
        KelasJurusan::create(['siswa_id' => $murid->id,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan]);
         return redirect('/admin/murid')->with('update', 'Data Siswa Telah diupdate');
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $murid)
    {
        $murid->delete();

        return redirect('admin/murid')->with('delete', 'Data Murid Telah di hapus');
    }

    public function cetak(){
        // $siswa = Siswa::all();
        $siswa_laki = Siswa::where('jenis_kelamin', 'Laki-Laki')->get()->count();
        $siswa_wanita = Siswa::where('jenis_kelamin', 'Wanita')->get()->count();
   
        $siswa = Siswa::leftjoin('kelas_jurusan', 'siswa.id', '=', 'kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id', '=', 'kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id', '=', 'jurusan.id')
        ->select('kelas.nama_kelas', 'jurusan.nama_jurusan','siswa.*')
        ->get();
        // dd($siswa);
        set_time_limit(300);
        $pdf = PDF::loadView('admin.siswa.cetak',compact('siswa', 'siswa_wanita', 'siswa_laki'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream();
    }
    public function rangking(Request $request){
        $siswa = Siswa::leftjoin('nilai', 'siswa.id', '=', 'nilai.siswa_id')
        ->leftjoin('kelas_jurusan', 'siswa.id','=','kelas_jurusan.siswa_id')
        ->leftjoin('kelas', 'kelas_jurusan.kelas_id','=','kelas.id')
        ->leftjoin('jurusan', 'kelas_jurusan.jurusan_id','=','jurusan.id')
        ->select('siswa.id as siswa_id','siswa.nis','siswa.nama','kelas.nama_kelas','jurusan.nama_jurusan','nilai.id as nilai_id',DB::raw('AVG(nilai.nilai_mapel)  as rata_rata_nilai'))
        ->orderby('rata_rata_nilai','desc')
        ->where('kelas.id', $request->kelas)
        ->where('jurusan.id', $request->jurusan)
        ->groupby('siswa.id')
        ->get();
        set_time_limit(300);
        $pdf = PDF::loadView('admin.siswa.rangking',compact('siswa'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream();
     
    }
     public function gender(Request $request){
        $siswa = Siswa::where('jenis_kelamin', $request->jenis_kelamin)
        ->get();
        set_time_limit(300);
        $pdf = PDF::loadView('admin.siswa.gender',compact('siswa'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream();
     
    }
      public function asal_sekolah(Request $request){
        $siswa = Siswa::where('asal_sekolah', $request->asal_sekolah)
        ->get();
        set_time_limit(300);
        $pdf = PDF::loadView('admin.siswa.asal_sekolah',compact('siswa'));
        $pdf->setPaper('a4','landscape');

        return $pdf->stream();
     
    }
}