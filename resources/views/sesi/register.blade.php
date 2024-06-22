@extends('layout.utama')
@section('judul', 'Halaman Login')
@section('konten')
    <div class="tengah">
        <div class="cardLogin">
                <h1>Register</h1>
                <form action="/sesi/create" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" value="{{ Session::get('name') }}" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
