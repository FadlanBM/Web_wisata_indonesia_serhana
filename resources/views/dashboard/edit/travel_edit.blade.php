@extends('dashboard.componen.main')
@section('main')

<form action="{{route('travel.update',$data->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('put')
  <div class="form-group">
    <label for="name">Nama Travel</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Masukkan Nama Travel">
  </div>
  <div class="form-group">
      <label for="judul">Judul Thumbnail</label>
      <textarea class="form-control" id="judul" name="judul" rows="3">{{$data->judul}}</textarea>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{$data->description}}</textarea>
    </div>
      <div class="form-group">
    <label for="biaya">Biaya</label>
    <input type="text" class="form-control" id="biaya" name="biaya" value="{{$data->biaya}}" placeholder="Masukkan Biaya Travel">
  </div>
    @if ($data->foto)
        <div class="mb-3">
          <img  style="max-width: 50px; max-height: 50px;" src="{{url('assets/img/foto_travel').'/'.$data->foto}}" alt="">
        </div>
    @endif
    <div class="form-group">
    <label for="foto">Upload Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>
    <div class="modal-footer">
                <a href='{{route('travel.create')}}' type="button" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
</form>

@endsection