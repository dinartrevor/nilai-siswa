<?php

namespace App\Http\Controllers\Murid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use App\Nilai;
use Auth;
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
        $siswa = Siswa::where('user_id', Auth::id())->first();
        $nilai = Nilai::where('siswa_id', $siswa->id )->get();
        return view('murid.histori-nilai', compact('nilai'));
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
        $pdf = PDF::loadView('murid.cetak-nilai',compact('siswa', 'nilai','remed','lulus'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
    }
}
