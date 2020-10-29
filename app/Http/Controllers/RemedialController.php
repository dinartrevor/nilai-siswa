<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Remedial;
use App\Siswa;
use DB;
class RemedialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remedial = Nilai::where('status', '=', 'Remed')->orderBy('created_at','Desc')->paginate(4);
                     
// dd($remedial);
        return view('admin.remedial.index', compact('remedial'));
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

    public function remedial_murid(Nilai $nilai){
        
        return view('murid.remedial', compact('nilai'));
    }

     public function bukti_remedial(Request $request,  Nilai $nilai)
    {
     
            $siswa= auth()->user()->id;
            if(isset($request->thumbnail) && $request->thumbnail){
                $uniquename='cvr_images_'.md5($nilai->id);
                $filename=$uniquename.'.'.$request->file('thumbnail')->getClientOriginalExtension();
                $path=public_path('storage/media/remedial');
                $request->thumbnail->move($path, $filename);
                $request->thumbnail = $filename;
            }
            $remedial = Remedial::create([
                'siswa_id' => $siswa,
                'nilai_id' => $nilai->id,
                'thumbnail' => $filename,
                'pesan' => $request->pesan,
                'status' => 'Proses'
            ]); 
            return redirect('/murid/histori-nilai')->with('sukses','Bukti Remedial sudah terkirim');
    }
    public function detail($id){
        $nilai = Nilai::find($id);
        if($nilai){
            $remedial = $nilai->remedial;
            $siswa = $nilai->siswa;
            // dd($siswa->kelas);  
        }
    //    dd($nilai);
  
        return view('admin.remedial.show', compact('nilai', 'remedial','siswa'));
    
    }
    public function detailUpdate(Request $request, $id){
        $data = $request->all();
        DB::beginTransaction();
        try {
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
        $nilai = Nilai::where('id',$id)->first();
        $remedial = Remedial::where('nilai_id', $nilai->id)->first();
        $data['kkm'] = $kkm;
        $data['status'] = $status;
        $nilai->update($data);
        if(isset($request->status_remed) && $request->status_remed){
            $remedial->status = $data['status_remed'];
            $remedial->save();
        }
        DB::commit();
        return redirect()->back();
     
    } catch (\Exception $ex) {
        DB::rollback();
        throw $ex;
    }
       
       
            
    }
}
