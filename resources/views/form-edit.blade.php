@extends('layouts.main')
@section('title','Ubah Makanan')
@section('artikel1')
<h1>FORM EDIT FOOD</h1>
@endsection
@section('artikel2')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <!-- Add Form Movies Disini -->
        <form action="/update/{{$mv->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Food Name</label>
                <input type="text" name="nama_makanan" class="form-control" value="{{ $mv->nama_makanan }}" required>
            </div>
            <div class="form-group">
                <label>Asal Daerah</label>
                <input type="text" name="asal_daerah" class="form-control" value="{{ $mv->asal_daerah }}" required>
            </div><div class="form-group">
                <label>Mutu Gizi</label>
                <input type="text" name="gizi" class="form-control" value="{{ $mv->gizi }}" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="0">==Pilih Kategori==</option>
                    <option value="Snack" {{ ($mv->kategori == "Snack") ? "Selected" :"" }} >Snack</option>
                    <option value="Breakfast" {{ ($mv->kategori == "Breakfast") ? "Selected" :"" }}>Breakfast</option>
                    <option value="Lunch" {{ ($mv->kategori == "Lunch") ? "Selected" :"" }}>Lunch</option>
                    <option value="Dinner" {{ ($mv->kategori == "Dinner") ? "Selected" :"" }}>Dinner</option>
                    <option value="Dessert" {{ ($mv->kategori == "Dessert") ? "Selected" :"" }}>Dessert</option>
                </select>
            </div>
            <div class="form-group">
                <label>Expired</label>
                <input type="number" min="1900" max="2100" name="expired" class="form-control" value="{{$mv ->expired}}" readonly required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <br>
                <input type="file" name="deskripsi" class="form-control-file" accept="image/*"> <br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>   
            </div>
        </form>
    </div>
</div>

@endsection