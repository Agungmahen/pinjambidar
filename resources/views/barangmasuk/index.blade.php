@extends('welcome')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Data Barang Masuk</h2>
            <hr class="w-25 mx-auto">
        </div>

        <div class="card shadow rounded-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="fas fa-boxes"></i> Daftar Barang</h6>
                <a href="{{ url('tambahbarangmasuk') }}" class="btn btn-light btn-sm shadow-sm">
                    <i class="fas fa-plus-circle me-1"></i> Tambah
                </a>
            </div>
            <div class="card-body">

                {{-- Pesan --}}
                @if (session('Pesan'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i> {{ session('Pesan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Form Hapus --}}
                <form action="{{ url('hapus-terpilih-barangmasuk') }}" method="POST" id="formHapus">
                    @csrf
                    {{-- <div class="mb-3 d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-danger btn-sm shadow-sm" onclick="return confirm('Yakin ingin menghapus data terpilih?')">
                            <i class="fas fa-trash-alt me-1"></i> Hapus Terpilih
                        </button>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th><input type="checkbox" id="checkAll"></th> --}}
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        {{-- <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td> --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kodebarangmasuk }}</td>
                                        <td>{{ $item->namabarang }}</td>
                                        <td>{{ $item->jumlahbarang }}</td>
                                        <td>
                                            <a href="{{ url('editbarangmasuk/' . $item->id) }}" class="btn btn-warning btn-sm me-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('hapusbarangmasuk/' . $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
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

    {{-- Script untuk Select All --}}
    <script>
        document.getElementById('checkAll').onclick = function() {
            const checkboxes = document.getElementsByName('ids[]');
            for (const checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        };
    </script>
@endsection
