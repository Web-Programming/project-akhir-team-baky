@extends('layout.utama')
@section('judul', 'Data Anggota')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Data Anggota Perpustakaan</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('anggota') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci"
                value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('anggota/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">ID Anggota</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-1">Gender</th>
                    <th class="col-md-1">Npm</th>
                    <th class="col-md-2">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data3->firstItem(); ?>
                @foreach ($data3 as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->id_anggota }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->npm }}</td>
                        <td>
                            <a href='{{ url('anggota/' . $item->id_anggota . '/edit') }}'
                                class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data')" class="d-inline"
                                action="{{ url('anggota/' . $item->id_anggota) }}" method="post">
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
        {{ $data3->withQueryString()->links() }}
    </div>
    <!-- AKHIR DATA -->
@endsection
