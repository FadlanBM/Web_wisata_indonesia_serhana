@extends('dashboard.componen.main')
@section('main')
<br>
        <p class="title" style="font-size: 25px; font-style: inherit;">Halaman Edit Seni Tari</p>
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
      <th scope="col">Asal</th>
      <th scope="col">Description</th>
      <th scope="col">Judul</th>
      <th scope="col">buatan</th>
      <th scope="col">pencipta</th>
      <th scope="col">pelaku</th>
      <th scope="col">rating</th>
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
            <img style="max-width: 50px; max-height: 50px" src="{{url('assets/img/foto_seni_tari').'/'.$item->foto}}" alt="">
        @endif
      </td>
      <td>{{$item->name}}</td>
      <td>{{$item->asal}}</td>
      <td>{{$item->description}}</td>
      <td>{{$item->judul}}</td>
      <td>{{$item->buatan}}</td>
      <td>{{$item->pencipta}}</td>
      <td>{{$item->pelaku}}</td>
      <td>{{$item->rating}}</td>
      <td>{{$item->created_at}}</td>
      <td>
          <a href='{{route('seni_tari.edit',$item->id)}}' class="btn btn-sm btn-warning">Edit</a>
          <form onsubmit="return confirm('Yakin Mau hapus data ini?')" action="{{route('seni_tari.destroy',$item->id)}}" method="POST" class="d-inline">
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
        <form action="{{route('seni_tari.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
  <div class="form-group">
    <label for="name">Nama Seni Tari</label>
    <input type="text" class="form-control" id="name" name="name" value="{{Session::get('name')}}" placeholder="Masukkan Nama Seni Tari">
  </div>
  <div class="form-group">
    <label for="asal">Asal Seni Tari</label>
    <input type="text" class="form-control" id="asal" name="asal" value="{{Session::get('asal')}}" placeholder="Masukkan Asal">
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
    <label for="buatan">Buatan</label>
    <input type="text" class="form-control" id="buatan" name="buatan" value="{{Session::get('buatan')}}" placeholder="Masukkan Nama Pembuat Tarian">
  </div>
    <div class="form-group">
    <label for="pencipta">Pencipta</label>
    <input type="text" class="form-control" id="pencipta" name="pencipta" value="{{Session::get('pencipta')}}" placeholder="Masukkan Nama Pencipta Tarian">
  </div>
   <div class="form-group">
      <label for="pelaku">Jumalah Pelaku Seni Tari</label>
      <textarea class="form-control" id="pelaku" name="pelaku" rows="3">{{Session::get('pelaku')}}</textarea>
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
