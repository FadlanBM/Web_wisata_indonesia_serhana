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
      <th scope="col">Pembuat</th>
      <th scope="col">Isi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td>
        @if ($item->foto)
            <img style="max-width: 50px; max-height: 50px" src="{{url('assets/img/foto_berita').'/'.$item->foto}}" alt="">
        @endif
      </td>
      <td>{{$item->id}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->pembuat}}</td>
      <td>{{$item->isi}}</td>
      <td>{{$item->created_at}}</td>
      <td>
          <a href='{{route('berita.edit',$item->id)}}' class="btn btn-sm btn-warning">Edit</a>
          <form onsubmit="return confirm('Yakin Mau hapus data ini?')" action="{{route('berita.destroy',$item->id)}}" method="POST" class="d-inline">
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
        <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="nama">Judul Berita</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{Session::get('nama')}}" placeholder="Masukkan Nama Judul berita">
  </div>
  <div class="form-group">
    <label for="pembuat">Nama Pembuat</label>
    <input type="text" class="form-control" id="pembuat" name="pembuat" value="{{Session::get('pembuat')}}" placeholder="Masukkan Nama pembuat berita">
  </div>
  <div class="form-group">
      <label for="isi">Isi Berita</label>
      <textarea class="form-control" id="isi" name="isi" rows="3">{{Session::get('isi')}}</textarea>
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
