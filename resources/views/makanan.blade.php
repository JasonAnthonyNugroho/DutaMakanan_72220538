@extends('layouts/main')
@section('Judul','.:Makanan:.')
@section('artikel1')
@endsection
@section('artikel2')
    <div class="card">
        <div class="card-header">
            <a href="/makanan/add-form" class ="btn btn-primary"><i class="bi bi-plus-square-dotted"></i> Tambah Makanan</a>
        </div>
        <div class="card-body">
            @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            @endif
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Gizi</th>
                <th>Kategori</th>
                <th>Expired</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mv as $idx => $m)
            <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{ $m->nama_makanan }}</td>
                <td>{{ $m->gizi }}</td>
                <td>{{ $m->kategori }}</td>
                <td>{{ $m->expired }}</td>
                <td>
                    @if(Storage::exists('public/'.$m->deskripsi))
                        <img src="{{ asset('/storage/'.$m->deskripsi) }}" alt="{{$m -> deskripsi}}" height="80" width="80">
                    @else
                        <img src="{{ asset('/storage/deskripsi/no-image.png')}}" alt="no-image" height="80" width="80">
                    @endif
                </td>
                <td><a href="/makanan/form-edit/{{$m -> id}}" class ="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <a href="/delete/{{ $m -> id }}" class ="btn btn-danger"><i class="bi bi-trash"></i></a>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>

    </div>

@endsection