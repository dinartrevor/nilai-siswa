<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Guru;
use App\Mapel;
use PDF;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('admin.guru.index',compact('guru','mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('admin.guru.tambah', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'min:5|required',
            'nip'=>'min:5|required|unique:guru',
            'kode'=>'min:5|required|unique:guru',
        ]);
        Guru::create([
            'kode' => $request->kode,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomer_hp' => $request->nomer_hp,
            'alamat' => $request->alamat,
            'mapel_id' => $request->mapel_id
        ]);

        return redirect('admin/guru')->with('sukses', 'Data Guru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.detail', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $mapel = Mapel::all();
        return view('admin.guru.edit', compact('guru','mapel'));
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
        $data = $request->all();

        $guru = Guru::where('id', $id)->first();
        $guru->update($data);
        return redirect('/admin/guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect('admin/guru')->with('delete', 'Data Guru telah di hapus');
    }

    public function cetak(){
      
        $guru = Guru::with('mapel')->get();
        // dd($guru);
         set_time_limit(300);
            $pdf = PDF::loadView('admin.guru.cetak',compact('guru'));
            $pdf->setPaper('a4','landscape');
    
            return $pdf->stream();
        
    }
    public function mapel(Request $request){
        $guru = Mapel::leftjoin('guru', 'mapel.id', '=', 'guru.mapel_id')       
        ->where('mapel.id', $request->mapel)
        ->select('guru.nama', 'mapel.nama_mapel')
        ->get();
        $pdf = PDF::loadView('admin.guru.mapel',compact('guru'));
        $pdf->setPaper('a4','landscape');
    
            return $pdf->stream();
    }
}