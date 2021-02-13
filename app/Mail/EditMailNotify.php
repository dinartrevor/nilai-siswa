<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EditMailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        return $this
        ->from([
            'email' => $request->email,
        ])
        ->view('admin.siswa.edit_siswa_notify')
        ->with
            ([
                'nama' => $request->nama,
                'password' => $request->nis
                 'nis' => $request->nis,
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
    }
}
