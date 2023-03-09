@extends('dashboard.componen.main')
@section('main')

<form action="{{route('wisata.update',$data->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('put')
  <div class="form-group">
    <label for="name">Nama Wisata</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Masukkan Nama Wisata">
  </div>
  <div class="form-group">
      <label for="lokasi">Lokasi Wisata</label>
      <textarea class="form-control" id="wisata" name="lokasi" rows="3">{{$data->lokasi}}</textarea>
    </div>
    <div class="form-group">
    <label for="desa">Desa</label>
    <input type="text" class="form-control" id="desa" name="desa" value="{{$data->desa}}" placeholder="Masukkan Nama Desa">
  </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{$data->description}}</textarea>
    </div>
      <div class="form-group">
    <label for="Judul">Judul Thumbnail</label>
    <input type="text" class="form-control" id="judul" name="judul" value="{{$data->judul}}" placeholder="Masukkan Thumbnail Tempat Wisata">
  </div>
   <div class="form-group">
      <label for="fasilitas">Fasilitas</label>
      <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">{{$data->fasilitas}}</textarea>
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
          <img  style="max-width: 50px; max-height: 50px;" src="{{url('assets/img/foto_wisata').'/'.$data->foto}}" alt="">
        </div>
    @endif
    <div class="form-group">
    <label for="foto">Upload Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>
    <div class="modal-footer">
                <a href='{{route('wisata.create')}}' type="button" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
</form>

@endsection