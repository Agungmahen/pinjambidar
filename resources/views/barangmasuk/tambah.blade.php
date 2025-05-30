@extends('welcome')
@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        background-color: #f8f9fa;
    }

    .add-card {
        width: 100%;
        max-width: 500px;
        padding: 30px;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background-color: #fff;
    }

    .form-label {
        font-weight: 600;
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="add-card">
        <div class="text-center mb-4">
            <h4 class="text-success">
                <i class="fa-solid fa-plus me-2"></i>Tambah Data Barang Masuk
            </h4>
        </div>

        @if (session('Pesan'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('Pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ url('tambahbarangmasukproses') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="kodebarangmasuk" class="form-label">Kode Barang</label>
                <input type="text" name="kodebarangmasuk" id="kodebarangmasuk" class="form-control"
                    required placeholder="Masukkan Kode Barang">
            </div>
            <div class="mb-3">
                <label for="namabarangmasuk" class="form-label">Nama Barang</label>
                <input type="text" name="namabarangmasuk" id="namabarangmasuk" class="form-control"
                    required placeholder="Masukkan Nama Barang">
            </div>
            <div class="mb-3">
                <label for="jumlahbarangmasuk" class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlahbarangmasuk" id="jumlahbarangmasuk" class="form-control"
                    required placeholder="Masukkan Jumlah Barang">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-paper-plane me-1"></i>Kirim
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
