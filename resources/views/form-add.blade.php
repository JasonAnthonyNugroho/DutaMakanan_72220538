@extends('layouts.main')
@section('title','Form Add Makanan')
@section('artikel1')
<h1>FORM Makanan</h1>
@endsection
@section('artikel2')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <!-- Add Form Movies Disini -->
        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Makanan</label>
                <input type="text" name="nama_makanan" class="form-control" required>
                
            </div>
            <div class="form-group">
                <label>Asal Daerah</label>
                <input type="text" name="asal_daerah" class="form-control">
            </div>
            <div class="form-group">
                <label>Mutu Gizi</label>
                <input type="text" name="gizi" class="form-control">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="0">>=Pilih Kategori=<</option>
                    <option value="Snack">Snack</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </div>
            <div class="form-group">
                <label>Expired</label>
                <input type="number" min="1900" max="2100" name="expired" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="file" name="deskripsi" class="form-control-file" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>   
            </div>
        </form>
    </div>
</div>

@endsection