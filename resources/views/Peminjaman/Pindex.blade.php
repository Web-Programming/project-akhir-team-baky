@extends('layout.utama')
@section('judul', 'Data Peminjaman')
<!-- START DATA -->
@section('konten')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Data Peminjaman Buku</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('peminjaman') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('peminjaman/create') }}' class="btn btn-primary">Pinjam Buku</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Nama Peminjam</th>
                    <th class="col-md-1">Buku</th>
                    <th class="col-md-2">Tanggal Pinjam</th>
                    <th class="col-md-2">Tanggal Wajib Kembali</th>
                    <th class="col-md-1">Status Peminjaman</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->peminjam->nama }}</td>
                        <td>{{ $item->dipinjam->judul_buku }}</td>
                        <td>{{ $item->tgl_pinjam }}</td>
                        <td>{{ $item->tgl_wajib_kembali }}</td>
                        @if ($item->status == 1)
                            <td><label class="p-1 bg-warning rounded">Dipinjam</label></td>
                        @elseif ($item->status == 2)
                            <td><label class="p-1 bg-success text-white rounded">Dikembalikan</label></td>
                        @endif
                        <td>
                            <a href="{{ url('pengembalian/' . $item->id) }}" class="btn btn-success btn-sm">Kembalikan</a>
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
