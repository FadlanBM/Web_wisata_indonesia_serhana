@extends('dashboard.componen.main')
@section('main')

<form action="{{route('berita.update',$data->id)}}" enctype="multipart/form-data" method="POST">
          @csrf
          @method('put')
  <div class="form-group">
    <label for="nama">Thumbnail Berita</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" placeholder="Masukkan Nama Thumbnail Berita">
  </div>
  <div class="form-group">
      <label for="pembuat">Masukkan Nama Pembuat</label>
    <input type="text" class="form-control" id="pembuat" name="pembuat" value="{{$data->pembuat}}" placeholder="Masukkan Nama Pembuat">
    </div>
    <div class="form-group">
    <label for="isi">Isi</label>
   <textarea class="form-control" id="isi" name="isi" rows="3">{{$data->isi}}</textarea>
  </div>
    @if ($data->foto)
        <div class="mb-3">
          <img  style="max-width: 50px; max-height: 50px;" src="{{url('assets/img/foto_berita').'/'.$data->foto}}" alt="">
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