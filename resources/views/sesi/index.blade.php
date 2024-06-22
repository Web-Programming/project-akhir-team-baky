@extends('layout.utama')
@section('judul', 'Halaman Login')
@section('konten')
<div class="tengah">
<div class="cardLogin">
    <h1>Login</h1>
    <form action="/sesi/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </div>
        <p>Anda belum memiliki akun?<a href="/sesi/register" class="btnLoginRegister"><b> Register</b></a></p>
    </form>
</div>
</div>


@endsection
