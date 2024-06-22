@extends('layout.utama')
<!-- START FORM -->
@section('judul', 'Tambah Anggota')
@section('konten')

    <form action='{{ url('anggota') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('anggota') }}" class="btn btn-secondary">
                << kembali</a>
                    <div class="mb-3 row">
                        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_anggota' id="id_anggota"
                                value="{{ old('id_anggota') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' id="nama"
                                value="{{ old('nama') }}">
                        </div>
                    </div>

                    <div class="d-flex flex-row mb-3 grid gap-3">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                    value="Laki-Laki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender"
                                    value="Perempuan" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='npm' id="npm"
                                value="{{ old('npm') }}">
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
