<?php

namespace App\Http\Controllers;
use App\Models\BarangMasukModel;

use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        $data = BarangMasukModel::all();
        return view ('barangmasuk/index',compact('data'));
    }
    public function tambah(){
        return view ('barangmasuk/tambah');
    }
    public function tambahproses(Request $req){
        //model inisial untuk database
        $data = new BarangMasukModel();
        $data-> kodebarangmasuk = $req -> kodebarangmasuk;
        $data-> namabarang = $req -> namabarangmasuk;
        $data-> jumlahbarang = $req -> jumlahbarangmasuk;
        $data-> save();
        session()->flash('Pesan', 'Data Berhasil Ditambah');
        return view('barangmasuk/tambah');
    }
    public function edit($id){
        $data = BarangMasukModel::FindOrFail($id);
        return view ('barangmasuk/edit',compact('data'));
    }
    public function editproses($id, Request $req){
        $data = BarangMasukModel::FindOrFail($id);
        $data -> kodebarangmasuk = $req -> kodebarangmasuk;
        $data -> namabarang = $req ->namabarangmasuk;
        $data -> jumlahbarang = $req -> jumlahbarangmasuk;
        $data -> save();
        session()->flash('Pesan', 'Data Berhasil Di Edit');
        return redirect ('editbarangmasuk/'.$id);
    }

    public function hapus($id){
        $data = BarangmasukModel::findOrFail($id);
        $data->delete();
        session()->flash('Pesan', 'Data Berhasil dihapus');
        return redirect()->back();
    }

    public function hapusTerpilih(Request $request)
    {
        $ids = $request->ids;
    
        if ($ids && is_array($ids)) {
            BarangmasukModel::whereIn('id', $ids)->delete();
            return redirect()->back()->with('Pesan', 'Data terpilih berhasil dihapus.');
        } else {
            return redirect()->back()->with('Pesan', 'Tidak ada data yang dipilih.');
        }
    }
}
