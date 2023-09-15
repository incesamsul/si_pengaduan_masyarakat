<?php

namespace App\Http\Controllers;

use App\Models\LaporanPengaduan;
use Illuminate\Http\Request;

class LaporanPengaduanController extends Controller
{
    public function laporanPengaduan()
    {
        $data['laporan_pengaduan'] = LaporanPengaduan::all();
        return view('pages.laporan_pengaduan.index', $data);
    }

    public function create()
    {
        return view('pages.laporan_pengaduan.create');
    }

    public function store(Request $request)
    {

        LaporanPengaduan::create([
            'judul_pengaduan' => $request->judul_pengaduan,
            'detail_pengaduan' => $request->detail_pengaduan
        ]);

        return redirect('/laporan_pengaduan')->with('message', 'berhasil di simpan');
    }
}
