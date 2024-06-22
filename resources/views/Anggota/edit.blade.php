@extends('layout.utama')
@section('judul', 'edit anggota')
<!-- START FORM -->
@section('konten')
    <form action='{{ url('anggota/' . $data->id_anggota) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('anggota') }}" class="btn btn-secondary">
                << kembali</a>
                    <div class="mb-3 row">
                        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                        <div class="col-sm-10">
                            {{ $data->id_anggota }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            {{ $data->gender }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' id="nama"
                                value="{{ $data->nama }}">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='npm' id="npm"
                                value="{{ $data->npm }}">
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
