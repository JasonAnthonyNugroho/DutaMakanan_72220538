@extends('layouts.main')
@section('title','Form Edit Password')
@section('artikel1')

@endsection
@section('artikel2')
@if (session('info'))
            <div class="alert alert-warning alert-dismissible fade show" role="info">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="info" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif  
    <form action="/updateuser" method="post">
        @csrf
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password_baru" class="form-control" required>
        </div>
        <div>
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="konfirmasi_password" class="form-control" required>
        </div>
        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
