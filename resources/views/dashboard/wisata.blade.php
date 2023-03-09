@extends('dashboard.componen.main')
@section('main')
<br>
        <p class="title" style="font-size: 25px; font-style: inherit;">Halaman Edit Wisata</p>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
 + Tambah Halaman
</button>
<br>
<br>
<table class="table table-stripped table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th>Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Desa</th>
      <th scope="col">Description</th>
      <th scope="col">Judul</th>
      <th scope="col">Fasilitas</th>
      <th scope="col">Rating</th>
      <th scope="col">Waktu Pembuatan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>
        @if ($item->foto)
            <img style="max-width: 50px; max-height: 50px" src="{{url('assets/img/foto_wisata').'/'.$item->foto}}" alt="">
        @endif
      </td>
      <td>{{$item->name}}</td>
      <td>{{$item->lokasi}}</td>
      <td>{{$item->desa}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->judul}}</td>
      <td>{{$item->fasilitas}}</td>
      <td>{{$item->rating}}</td>
      <td>{{$item->created_at}}</td>
      <td>
          <a href='{{route('wisata.edit',$item->id)}}' class="btn btn-sm btn-warning">Edit</a>
          <form onsubmit="return confirm('Yakin Mau hapus data ini?')" action="{{route('wisata.destroy',$item->id)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" name="submit">Hapus</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$data->links()}}


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('wisata.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="name">Nama Wisata</label>
    <input type="text" class="form-control" id="name" name="name" value="{{Session::get('name')}}" placeholder="Masukkan Nama Wisata">
  </div>
  <div class="form-group">
      <label for="lokasi">Lokasi Wisata</label>
      <textarea class="form-control" id="wisata" name="lokasi" rows="3">{{Session::get('lokasi')}}</textarea>
    </div>
    <div class="form-group">
    <label for="desa">Desa</label>
    <input type="text" class="form-control" id="desa" name="desa" value="{{Session::get('desa')}}" placeholder="Masukkan Nama Desa">
  </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{Session::get('description')}}</textarea>
    </div>
      <div class="form-group">
    <label for="Judul">Judul Thumbnail</label>
    <input type="text" class="form-control" id="judul" name="judul" value="{{Session::get('judul')}}" placeholder="Masukkan Thumbnail Tempat Wisata">
  </div>
   <div class="form-group">
      <label for="fasilitas">Fasilitas</label>
      <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">{{Session::get('fasilitas')}}</textarea>
    </div>
    <div class="form-group">
      <label for="rating">Rating</label>
      <select class="form-control" id="rating" name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
  <div class="form-group">
    <label for="foto">Upload Foto</label>
    <input type="file" class="form-control-file" id="foto" name="foto">
  </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
@endsection
