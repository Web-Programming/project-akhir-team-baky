@extends('layout.utama')
<!-- START FORM -->
@section('judul', 'Tambah Data Buku')
@section('konten')

    <form action='{{ url('buku') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('anggota') }}" class="btn btn-secondary">
                << kembali</a>
                    <div class="mb-3 row">
                        <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='judul_buku' id="judul_buku"
                                value="{{ old('judul_buku') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori_id" class="col-sm-2 col-form-label">Kategori Buku</label>
                        <div class="col-sm-10">
                            <select id="kategori_id" name="kategori_id" class="form-select">
                                <option disabled value selected>--Pilih Kategori--</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('kategori_id') == $item->id ? 'selected' : null }}>{{ $item->namaKategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='penerbit' id="penerbit"
                                value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='pengarang' id="pengarang"
                                value="{{ old('pengarang') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='stok' id="stok"
                                value="{{ old('stok') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sampul_buku" class="col-sm-2 col-form-label">Sampul Buku</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name='sampul_buku' id="sampul_buku"
                                value="{{ old('sampul_buku') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
@endsection
