<?php

namespace App\Http\Controllers;

use App\Models\wisata;
use Illuminate\Http\Request;
use App\Http\Requests\StorewisataRequest;
use App\Http\Requests\UpdatewisataRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = wisata::orderBY('id', 'ASC')->paginate(6);
        return view('landing_page.wisata')->with('wisata', $wisata);
    }

    public function admin()
    {
    
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=wisata::orderBY('id','ASC')->paginate(6);
        return view('dashboard.wisata')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorewisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('lokasi',$request->lokasi);
        Session::flash('desa',$request->desa);
        Session::flash('description',$request->description);
        Session::flash('judul',$request->judul);
        Session::flash('fasilitas',$request->fasilitas);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'name'=>'required',
                'lokasi'=>'required',
                'desa'=>'required',
                'description'=>'required',
                'judul'=>'required',
                'fasilitas'=>'required'
                
            ],[
                'foto.required'=>'Form foto wajib dimasukkan',
                'name.required'=>'Form Nama wajib di isi',
                'lokasi.required'=>'Form Lokasi wajib di isi',
                'desa.required'=>'Form Desa wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul wajib di isi ',
                'fasilitas.required'=>'Form fasilitas wajib di isi',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_wisata'),$foto_data);

        $data=[
            'name'=>$request->name,
            'lokasi'=>$request->lokasi,
            'desa'=>$request->desa,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'fasilitas'=>$request->fasilitas,
            'rating'=>$request->rating,
            'foto'=>$foto_data
        ];
        wisata::create($data);
        return redirect()->route('wisata.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = wisata::where('id', $id)->first();
        return view('landing_page.show.Swisata')->with('wisata', $wisata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=wisata::where('id',$id)->first();
        return view('dashboard.edit.wisata_edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewisataRequest  $request
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [   
                'name'=>'required',
                'lokasi'=>'required',
                'desa'=>'required',
                'description'=>'required',
                'judul'=>'required',
                'fasilitas'=>'required'
                
            ],[
                'name.required'=>'Form Nama wajib di isi',
                'lokasi.required'=>'Form Lokasi wajib di isi',
                'desa.required'=>'Form Desa wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul wajib di isi ',
                'fasilitas.required'=>'Form Fasilitas wajib di isi'
            ]
            );

        $data=[
            'name'=>$request->name,
            'lokasi'=>$request->lokasi,
            'desa'=>$request->desa,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'fasilitas'=>$request->fasilitas,
            'rating'=>$request->rating
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
            $foto_file->move(public_path('assets/img/foto_wisata'),$foto_data);

            $data_foto=wisata::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_wisata').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        wisata::where('id', $id)->update($data);
        return redirect()->route('wisata.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(wisata $wisata,$id)
    {
        $data=wisata::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_wisata').'/'.$data->foto);
        wisata::where('id',$id)->delete();
        return redirect()->route('wisata.create')->with('success','Berhasil Delete Data');
    }
}
