@extends('welcome')
@section('content')
<div class="container mt-4">
    <div class="text-center mb-3">
        <h2 class="fw-bold">Data Barang Keluar</h2>
        <hr class="w-25 mx-auto">
    </div>

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h6 class="mb-0 fw-semibold"><i class="fa-solid fa-boxes-packing me-2"></i>Data Barang</h6>
            <a href="{{ url('tambahbarangkeluar') }}" class="btn btn-light text-primary fw-bold rounded-pill">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>

        <div class="card-body">
            {{-- Pesan --}}
            @if (session('Pesan'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('Pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form Hapus --}}
            <form action="{{ url('hapus-terpilih-barangmasuk') }}" method="POST" id="formHapus">
                @csrf
                {{-- <div class="mb-3">
                    <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Yakin ingin menghapus data terpilih?')">
                        <i class="fa-solid fa-trash me-1"></i> Hapus Terpilih
                    </button>
                </div> --}}

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                {{-- <th><input type="checkbox" id="checkAll"></th> --}}
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                {{-- <td class="text-center">
                                    <input type="checkbox" name="ids[]" value="{{ $item->id }}">
                                </td> --}}
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->kodebarang }}</td>
                                <td>{{ $item->namabarang }}</td>
                                <td class="text-center">{{ $item->jumlah }}</td>
                                <td class="text-center">
                                    <a href="{{ url('editbarangkeluar/' . $item->id) }}" class="btn btn-warning btn-sm rounded-pill me-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <a href="{{ url('hapusbarangkeluar/' . $item->id) }}" class="btn btn-danger btn-sm rounded-pill"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script untuk ceklis semua --}}
<script>
    document.getElementById('checkAll').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection
