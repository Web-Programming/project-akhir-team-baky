@extends('layout.utama')
<!-- START FORM -->
@section('judul', 'Form peminjaman')
@section('konten')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <form action='{{ url('peminjaman') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('peminjaman') }}" class="btn btn-secondary">
                << kembali</a>
                <div class="mb-3 row">
                    <label for="id_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-10">
                        <select id="id_peminjam" name="id_peminjam" class="form-select kotak">
                            <option disabled value selected>--Pilih Peminjam--</option>
                            @foreach ($data_anggota as $item)
                                <option value="{{ $item->id_anggota }}"
                                     {{ old('id_peminjam') == $item->id_anggota ? 'selected' : null }}>{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="mb-3 row">
                        <label for="id_buku" class="col-sm-2 col-form-label">Buku</label>
                        <div class="col-sm-10">
                            <select id="id_buku" name="id_buku" class="form-select kotak">
                                <option disabled value selected>--Pilih Buku--</option>
                                @foreach ($data_buku as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('id_buku') == $item->id ? 'selected' : null }}>{{ $item->judul_buku }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tgl_pinjam' id="tgl_pinjam"
                                value="{{ old('tgl_pinjam') }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">PINJAM</button>
                        </div>
                    </div>
        </div>
    </form>
    <!-- AKHIR FORM -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.kotak').select2();
        });
    </script>
@endsection
