@extends('layout.utama')
<!-- START FORM -->
@section('judul', 'Tambah Kategori Buku')
@section('konten')

    <form action='{{ url('kategoriBuku') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('kategoriBuku') }}" class="btn btn-secondary">
                << kembali</a>
                    <div class="mb-3 row">
                        <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='namaKategori' id="namaKategori"
                                value="{{ old('namaKategori') }}">
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
