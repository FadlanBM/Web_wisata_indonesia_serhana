@extends('dashboard.componen.main')
@section('main')
<br>
        <p class="title" style="font-size: 25px; font-style: inherit;">Halaman Edit Berita</p>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
 + Tambah Halaman
</button>
<br>
<br>
<table class="table table-stripped table-hover">
  <thead>
    <tr>
      <th>Foto</th>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Description</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Link Twiter</th>
      <th scope="col">Link Youtube</th>
      <th scope="col">Link Facebook</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td>
        @if ($item->foto)
            <img style="max-width: 50px; max-height: 50px" src="{{url('assets/img/foto_index').'/'.$item->foto}}" alt="">
        @endif
      </td>
      <td>{{$item->id}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->jabatan}}</td>
      <td>{{$item->twiter}}</td>
      <td>{{$item->youtube}}</td>
      <td>{{$item->facebook}}</td>
      <td>{{$item->created_at}}</td>
      <td>
          <a href='{{route('index.edit',$item->id)}}' class="btn btn-sm btn-warning">Edit</a>
          <form onsubmit="return confirm('Yakin Mau hapus data ini?')" action="{{route('index.destroy',$item->id)}}" method="POST" class="d-inline">
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
        <form action="{{route('index.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="nama">Nama Pemimpin</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{Session::get('nama')}}" placeholder="Masukkan Nama Judul berita">
  </div>
  <div class="form-group">
    <label for="description">Pesan Pesan Pemimpin</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{Session::get('description')}}</textarea>
  </div>
  <div class="form-group">
      <label for="jabatan">Jabatan</label>
      <textarea class="form-control" id="jabatan" name="jabatan" rows="3">{{Session::get('jabatan')}}</textarea>
    </div>
  <div class="form-group">
      <label for="twiter">link Twiter</label>
      <textarea class="form-control" id="twiter" name="twiter" rows="3">{{Session::get('twiter')}}</textarea>
    </div>
  <div class="form-group">
      <label for="youtube">Link Youtube</label>
      <textarea class="form-control" id="youtube" name="youtube" rows="3">{{Session::get('youtube')}}</textarea>
    </div>
  <div class="form-group">
      <label for="facebook">Link Facebook</label>
      <textarea class="form-control" id="facebook" name="facebook" rows="3">{{Session::get('facebook')}}</textarea>
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
