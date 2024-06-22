@extends('layout.utama')
@section('judul', 'Kategori Buku')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Kategori Buku</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('kategoriBuku') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci"
                value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('kategoriBuku/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="col-md-1">Nama Kategori</th>
                    <th class="col-md-1">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_kategori as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->namaKategori }}</td>
                        <td>
                            <form onsubmit="return confirm('Yakin akan menghapus data')" class="d-inline"
                                action="{{ url('kategoriBuku/' . $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data_kategori->withQueryString()->links() }}
    </div>
    <!-- AKHIR DATA -->
@endsection
