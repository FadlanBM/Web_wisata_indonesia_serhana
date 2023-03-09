@extends('dashboard.componen.main')
@section('main')

<form action="{{route('index.update',$data->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('put')
  <div class="form-group">
    <label for="nama">Nama Pemimpin</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" placeholder="Masukkan Nama Thumbnail Berita">
  </div>
  <div class="form-group">
      <label for="description">Pesan Pesan Pemimpin</label>
   <textarea class="form-control" id="description" name="description" rows="3">{{$data->description}}</textarea>
    </div>
    <div class="form-group">
    <label for="jabatan">Jabatan</label>
   <textarea class="form-control" id="jabatan" name="jabatan" rows="3">{{$data->jabatan}}</textarea>
  </div>
    <div class="form-group">
    <label for="twiter">Link Twiter</label>
   <textarea class="form-control" id="twiter" name="twiter" rows="2">{{$data->twiter}}</textarea>
  </div>
    <div class="form-group">
    <label for="youtube">Link Youtube</label>
   <textarea class="form-control" id="youtube" name="youtube" rows="2">{{$data->youtube}}</textarea>
  </div>
    <div class="form-group">
    <label for="facebook">Link Facebook</label>
   <textarea class="form-control" id="facebook" name="facebook" rows="2">{{$data->facebook}}</textarea>
  </div>
    @if ($data->foto)
        <div class="mb-3">
          <img  style="max-width: 50px; max-height: 50px;" src="{{url('assets/img/foto_index').'/'.$data->foto}}" alt="">
        </div>
    @endif
    <div class="form-group">
    <label for="foto">Upload Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>
    <div class="modal-footer">
                <a href='{{route('index.create')}}' type="button" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
</form>

@endsection