@extends('dashboard.componen.main')
@section('main')
<br>
        <p class="title" style="font-size: 25px; font-style: inherit;">Halaman Edit Travel</p>
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
      <th scope="col">Judul</th>
      <th scope="col">description</th>
      <th scope="col">Biaya</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>
        @if ($item->foto)
            <img style="max-width: 50px; max-height: 50px" src="{{url('assets/img/foto_travel').'/'.$item->foto}}" alt="">
        @endif
      </td>
      <td>{{$item->name}}</td>
      <td>{{$item->judul}}</td>
      <td>{{$item->deskription}}</td>
      <td>{{$item->biaya}}</td>
      <td>{{$item->created_at}}</td>
      <td>
          <a href='{{route('travel.edit',$item->id)}}' class="btn btn-sm btn-warning">Edit</a>
          <form onsubmit="return confirm('Yakin Mau hapus data ini?')" action="{{route('travel.destroy',$item->id)}}" method="POST" class="d-inline">
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
        <h5 class="modal-title" id="exampleModalLongTitle">Form Data Trevel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('travel.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="name">Nama Travel</label>
    <input type="text" class="form-control" id="name" name="name" value="{{Session::get('name')}}" placeholder="Masukkan Nama Travel">
  </div>
  <div class="form-group">
      <label for="judul">Thumbnail Travel</label>
    <input type="text" class="form-control" id="judul" name="judul" value="{{Session::get('judul')}}" placeholder="Masukkan Thumbnail halaman">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{Session::get('description')}}</textarea>
    </div>
    <div class="form-group">
    <label for="biaya">Biaya</label>
    <input type="text" class="form-control" id="biaya" name="biaya" value="{{Session::get('biaya')}}" placeholder="Masukkan Biaya travel">
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
