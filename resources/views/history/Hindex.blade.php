@extends('layout.utama')
@section('judul', 'History Peminjaman')
<!-- START DATA -->
@section('konten')

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>History Peminjaman</h2>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('peminjaman') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">Nama Peminjam</th>
                    <th class="col-md-1">Buku</th>
                    <th class="col-md-2">Tanggal Pinjam</th>
                    <th class="col-md-2">Tanggal Kembali</th>
                    <th class="col-md-1">denda</th>
                    <th class="col-md-1">Status Peminjaman</th>
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
                        <td>{{ $item->tgl_kembali }}</td>
                        <td class="text-danger">{{ $item->denda }}</td>
                        @if ($item->status == 1)
                            <td><label class="p-1 bg-warning rounded">Dipinjam</label></td>
                        @elseif ($item->status == 2)
                            <td><label class="p-1 bg-success text-white rounded">Dikembalikan</label></td>
                        @endif
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
    <!-- AKHIR DATA -->

@endsection
