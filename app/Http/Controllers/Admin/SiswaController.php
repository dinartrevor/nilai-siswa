<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kelas;
use App\User;
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
        return view('admin.siswa.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.tambah', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= User::create([

            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
            'level' => "siswa"
        ]);
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->nis),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'kelas_id' => $request->jurusan,
            'kelas_id' => $request->tahun_ajaran,
            'asal_sekolah' => $request->asal_sekolah,
            'user_id' => $user->id
        ]);


        return redirect('/admin/murid')->with('sukses', 'Data Siswa Telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $murid)
    {
        $murid = Siswa::all()->first();
        return view('admin.siswa.detail', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $murid, Kelas $kelas)
    {
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('murid', 'kelas'));
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
}
