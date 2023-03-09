@extends('dashboard.componen.main')
@section('main')

<form action="{{route('seni_tulis.update',$data->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('put')
  <div class="form-group">
    <label for="name">Nama Seni tulis</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Masukkan Nama Seni Tulis">
  </div>
  <div class="form-group">
      <label for="asal">Asal Seni tulis</label>
      <textarea class="form-control" id="asal" name="asal" rows="3">{{$data->asal}}</textarea>
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}" placeholder="Masukkan Description">
  </div>
    <div class="form-group">
      <label for="judul">Judul Thumbnail</label>
      <textarea class="form-control" id="judul" name="judul" rows="3">{{$data->judul}}</textarea>
    </div>
      <div class="form-group">
    <label for="buatan">Buatan</label>
    <input type="text" class="form-control" id="buatan" name="buatan" value="{{$data->buatan}}" placeholder="Masukkan nama pembuatan">
  </div>
    <div class="form-group">
      <label for="rating">Rating</label>
      <select class="form-control" id="rating" name="rating">
        <option value="{{$data->rating}}">{{$data->rating}}</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    @if ($data->foto)
        <div class="mb-3">
          <img  style="max-width: 50px; max-height: 50px;" src="{{url('assets/img/foto_seni_tulis').'/'.$data->foto}}" alt="">
        </div>
    @endif
    <div class="form-group">
    <label for="foto">Upload Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>
    <div class="modal-footer">
                <a href='{{route('seni_tulis.create')}}' type="button" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
</form>

@endsection