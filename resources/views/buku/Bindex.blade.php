@extends('layout.utama')
@section('judul', 'buku')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Data Buku Perpustakaan</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('buku') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci"
                value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('buku/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Sampul Buku</th>
                    <th class="col-md-1">ID buku</th>
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Kategori</th>
                    <th class="col-md-1">Penerbit</th>
                    <th class="col-md-1">Pengarang</th>
                    <th class="col-md-1">Stok</th>
                    <th class="col-md-2">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i}}</td>
                        <td>
                            <img src="{{ asset('storage/'.$item->sampul_buku) }}" width="100px" alt="Sampul Buku">
                        </td>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->kategoriAja->namaKategori }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                            <a href='{{ url('buku/' . $item->id . '/edit') }}'
                                class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data')" class="d-inline"
                                action="{{ url('buku/' . $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
    <!-- AKHIR DATA -->
@endsection
