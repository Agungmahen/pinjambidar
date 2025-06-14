<?php

namespace App\Http\Controllers;
use App\Models\BarangKeluarModel;
use App\Models\BarangMasukModel;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index(){
        $data = BarangKeluarModel::all();
        return view ('barangkeluar/index',compact('data'));
    }

    public function add(){
        $data = BarangMasukModel::all();
        return view ('barangkeluar/add',compact('data'));
    }

    public function addproses(Request $req){
    $barang = BarangMasukModel::where("kodebarangmasuk", $req->kodebarangmasuk)->first();
    // Cek apakah barang ditemukan
    if ($barang) {
        // Cek apakah jumlah yang diminta tersedia
        if ($req->jumlah <= $barang->jumlahbarang) {
            // Buat entri barang keluar
            $data = new BarangKeluarModel();
            $data->kodebarang = $req->kodebarangmasuk; // perbaiki, gunakan dari data yang ditemukan
            $data->namabarang = $barang->namabarang;
            $data->jumlah = $req->jumlah;
            $data->save();

            // Kurangi stok barang masuk
            $barang->jumlahbarang -= $req->jumlah;
            $barang->save();

            return redirect('tambahbarangkeluar')->with('success', 'Barang berhasil dikeluarkan');
        } else {
            // Jika jumlah tidak mencukupi, kembalikan ke halaman dengan pesan error
            return redirect('tambahbarangkeluar')->with('error', 'Jumlah barang yang diminta melebihi stok tersedia.');
        }
    } else {
        // Jika barang tidak ditemukan
        return redirect('tambahbarangkeluar')->with('error', 'Barang tidak ditemukan.');
    }
}


public function edit($id, Request $req){
    $masuk = BarangMasukModel::all();
    $keluar = BarangKeluarModel::findOrFail($id);
    return view ('barangkeluar/edit',compact('masuk','keluar'));

}

public function editproses(Request $req, $id)
{
    $data = BarangKeluarModel::findOrFail($id); // Data sebelum diubah
    $masuk = BarangMasukModel::where('kodebarangmasuk', $data->kodebarang)->first();

    if (!$masuk) {
        return redirect()->back()->with('eror', 'Data barang masuk tidak ditemukan');
    }

    // Kembalikan jumlah lama ke stok
    $masuk->jumlahbarang += $data->jumlah;

    // Cek apakah stok cukup untuk dikurangi dengan jumlah baru
    if ($req->jumlah <= $masuk->jumlahbarang) {
        // Update data keluar
        $data->kodebarang = $req->kodebarangmasuk;
        $data->jumlah = $req->jumlah;
        $data->save();

        // Kurangi stok dengan jumlah baru
        $masuk->jumlahbarang -= $req->jumlah;
        $masuk->save();

        return redirect()->back()->with('pesan', 'Berhasil Edit Data');
    } else {
        return redirect()->back()->with('eror', 'Jumlah melebihi stok');
    }
}



public function hapus($id){
        $data = BarangKeluarModel::findOrFail($id);
        $data->delete();
        session()->flash('Pesan', 'Data Berhasil dihapus');
        return redirect()->back();
    }

}
