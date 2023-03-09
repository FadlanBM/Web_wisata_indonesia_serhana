<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreberitaRequest;
use App\Http\Requests\UpdateberitaRequest;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $berita = berita::orderBY('id', 'ASC')->paginate(1);
        return view('landing_page.berita')->with('berita', $berita);
    }

    public function detail($id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=berita::orderBY('id','ASC')->paginate(6);
        return view('dashboard.berita')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreberitaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama',$request->nama);
        Session::flash('pembuat',$request->pembuat);
        Session::flash('isi',$request->isi);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'nama'=>'required',
                'pembuat'=>'required',
                'isi'=>'required',
                
            ],[
                'foto.required'=>'Form foto wajib dimasukkan',
                'nama.required'=>'Form Judul wajib di isi',
                'pembuat.required'=>'Form Nama Pembuat wajib di isi',
                'isi.required'=>'Form Isi wajib di isi',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_berita'),$foto_data);

        $data=[
            'nama'=>$request->nama,
            'pembuat'=>$request->pembuat,
            'isi'=>$request->isi,
            'foto'=>$foto_data
        ];
        berita::create($data);
        return redirect()->route('berita.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $berita = berita::where('id', $id)->first();
        return view('landing_page.show.Sberita')->with('berita', $berita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=berita::where('id',$id)->first();
        return view('dashboard.edit.berita_edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateberitaRequest  $request
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [   
                'nama'=>'required',
                'pembuat'=>'required',
                'isi'=>'required'
                
            ],[
                'nama.required'=>'FormNama wajib di isi',
                'pembuat.required'=>'Form Pembuat wajib di isi',
                'isi.required'=>'Form isi wajib di isi',
            ]
            );

        $data=[
            'nama'=>$request->nama,
            'pembuat'=>$request->pembuat,
            'isi'=>$request->isi
        ];

        if($request->hasFile('foto')){
                $request->validate([
                'foto'=>'required|mimes:jpeg,jpg,png,gif'
                ],[
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
                ]);
            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_berita'),$foto_data);

            $data_foto=berita::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_berita').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        berita::where('id', $id)->update($data);
        return redirect()->route('berita.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(berita $berita,$id)
    {
        $data=berita::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_berita').'/'.$data->foto);
        berita::where('id',$id)->delete();
        return redirect()->route('berita.create')->with('success','Berhasil Delete Data');
    }
}
