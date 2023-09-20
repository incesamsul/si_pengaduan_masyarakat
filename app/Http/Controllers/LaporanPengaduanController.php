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

    public function create($id = null)
    {
        if ($id) {
            $data['id'] = $id;
            $data['edit'] = LaporanPengaduan::find($id);
        } else {
            $data['id'] = null;
            $data['edit'] = [];
        }
        return view('pages.laporan_pengaduan.create', $data);
    }

    public function store(Request $request)
    {

        $gambar = $request->file('gambar');
        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $gambar->move('data/gambar_pengaduan', $nama_gambar);


        LaporanPengaduan::create([
            'judul_pengaduan' => $request->judul_pengaduan,
            'detail_pengaduan' => $request->detail_pengaduan,
            'gambar' => $nama_gambar
        ]);

        return redirect('/laporan_pengaduan')->with('message', 'berhasil di simpan');
    }

    public function update(Request $request)
    {
        LaporanPengaduan::where('id', $request->id)->update([
            'judul_pengaduan' => $request->judul_pengaduan,
            'detail_pengaduan' => $request->detail_pengaduan
        ]);
        return redirect('/laporan_pengaduan')->with('message', 'berhasil di update');
    }

    public function delete($id)
    {
        LaporanPengaduan::where('id', $id)->delete();
        return redirect('/laporan_pengaduan')->with('message', 'berhasil di hapus');
    }

    public function status()
    {
        $data['pengaduan'] = LaporanPengaduan::all();
        return view('pages.laporan_pengaduan.status', $data);
    }

    public function laporanPemetaan()
    {
        return view('pages.laporan_pengaduan.pemetaan');
    }

    public function updateStatus($status, $id)
    {
        LaporanPengaduan::where('id', $id)->update([
            'status' => $status
        ]);
        return redirect('/status_laporan')->with('message', 'berhasil di update');
    }
}
