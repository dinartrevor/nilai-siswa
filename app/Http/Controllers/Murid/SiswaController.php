<?php

namespace App\Http\Controllers\Murid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Siswa;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
class SiswaController extends Controller
{
    public function editProfil(){
        $auth = Auth::user();
        $siswa = Siswa::where('user_id',$auth->id)->first();
      return view('murid.editProfil', compact('siswa'));
    }
    public function editProfilSiswa(Request $request, $id){
        $data = $request->all();
        $auth = Auth::user();
       
        DB::beginTransaction();
        try {
            $siswa = Siswa::where('user_id',$auth->id)->where('id', $id)->first();
            if(isset($request->images) && $request->images){
                $uniquename='cvr_images_'.md5($id);
                $filename=$uniquename.'.'.$request->file('images')->getClientOriginalExtension();
                $path=public_path('storage/media/profile');
                $request->images->move($path, $filename);
                $data['images']=$filename;
            }
            if(isset($request->password_lama) && $request->password_lama){
                if (!(Hash::check($request->get('password_lama'), Auth::user()->password    ))) {
                    return redirect()->back()->with("status","Kata sandi Anda saat ini tidak cocok dengan kata sandi yang Anda berikan. Silakan coba lagi.");
                }

                if(strcmp($request->get('password'), $request->get('new_password')) == 0){
                    return redirect()->back()->with("status","Kata sandi baru tidak boleh sama dengan kata sandi Anda saat ini. Silakan pilih kata sandi yang berbeda.");
                }

                // $request->validate([
                //     'current-password' => 'required',
                //     'new-password' => 'required|string|min:6|confirmed',
                // ]);

                $user = Auth::user();
                $user->password = bcrypt($request->get('new_password'));
                DB::commit();
                $user->save();

                return redirect()->back()->with("status","Password Berhasil diganti !");
            }
            $siswa->update($data);
            DB::commit();
            return redirect()->back()->with("status","Update successfully !");
        }catch (\Exception $ex) {
                DB::rollback();
                throw $ex;
            }
    //   return view('murid.editProfil', compact('siswa'));
    }
}
