@extends('welcome')
@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        background-color: #f8f9fa;
    }
</style>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg border-0 rounded-4" style="min-width: 400px;">
        <div class="card-header bg-success text-light text-center rounded-top-4">
            <h5 class="mb-0"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Data Barang Keluar</h5>
        </div>
        <div class="card-body p-4">
            
            {{-- Notifikasi --}}
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>{{ session('pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('editbarangkeluar/' . $keluar->id) }}" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="kodebarangmasuk" class="form-label fw-semibold">Kode Barang</label>
                    <input type="text" class="form-control" id="kodebarangmasuk" name="kodebarangmasuk" value="{{ $keluar->kodebarang }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="jumlah" class="form-label fw-semibold">Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="Masukkan Jumlah Barang">
                </div>

                <button type="submit" class="btn btn-success w-100 rounded-pill">
                    <i class="fa-solid fa-paper-plane me-1"></i> Kirim
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
