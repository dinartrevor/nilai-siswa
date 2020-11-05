<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mapel;
use PDF;
class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view('admin.mapel.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mapel::create([
            'kode_mapel' => $request->kode,
            'nama_mapel'=> $request->nama_mapel,
            'semester'=> $request->semester
        ]);

        return redirect('/admin/mapel')->with('sukses', 'Data Mapel Telah ditambahkan');
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
    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit',compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel->update([
            'kode_mapel' => $request->kode,
            'nama_mapel'=> $request->nama_mapel,
            'semester'=> $request->semester
        ]);

        return redirect('/admin/mapel')->with('update', 'Data Mapel Telah di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
         $mapel->delete();
        return redirect('/admin/mapel')->with('delete', 'Data Mapel berhasil dihapus');
    }

    public function cetak(){
        $mapel = Mapel::get();
        // dd($guru);
            $pdf = PDF::loadView('admin.mapel.cetak',compact('mapel'));
            $pdf->setPaper('a4','landscape');
    
            return $pdf->stream();
    }
}
