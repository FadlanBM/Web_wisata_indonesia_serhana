<?php

namespace App\Http\Controllers;

use App\Models\seniTari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreseniTariRequest;
use App\Http\Requests\UpdateseniTariRequest;

class SeniTariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seniTari = seniTari::orderBY('id', 'ASC')->paginate(6);
        return view('landing_page.seni_tari')->with('seniTari', $seniTari);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= seniTari::orderBY('id','ASC')->paginate(6);
        return view('dashboard.seni_tari')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreseniTariRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('asal',$request->asal);
        Session::flash('description',$request->description);
        Session::flash('judul',$request->judul);
        Session::flash('buatan',$request->buatan);
        Session::flash('pencipta',$request->pencipta);
        Session::flash('pelaku',$request->pelaku);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'name'=>'required',
                'asal'=>'required',
                'description'=>'required',
                'judul'=>'required',
                'buatan'=>'required',
                'pencipta'=>'required',
                'pelaku'=>'required'
                
            ],[
                'foto.required'=>'Form foto wajib dimasukkan',
                'name.required'=>'Form Nama wajib di isi',
                'asal.required'=>'Form Asal Seni Tari wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul Thumbnail wajib di isi',
                'buatan.required'=>'Form buatan wajib di isi ',
                'pencipta.required'=>'Form pencipta wajib di isi',
                'pelaku.required'=>'Form pelaku wajib di isi',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_seni_tari'),$foto_data);

        $data=[
            'name'=>$request->name,
            'asal'=>$request->asal,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'buatan'=>$request->buatan,
            'pencipta'=>$request->pencipta,
            'pelaku'=>$request->pelaku,
            'rating'=>$request->rating,
            'foto'=>$foto_data
        ];
        seniTari::create($data);
        return redirect()->route('seni_tari.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seniTari  $seniTari
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $senitari = seniTari::where('id', $id)->first();
        return view('landing_page.show.SseniTari')->with('senitari', $senitari);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seniTari  $seniTari
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=seniTari::where('id',$id)->first();
        return view('dashboard.edit.seni_tari_edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateseniTariRequest  $request
     * @param  \App\Models\seniTari  $seniTari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $request->validate(
            [   
                'name'=>'required',
                'asal'=>'required',
                'description'=>'required',
                'judul'=>'required',
                'buatan'=>'required',
                'pencipta'=>'required',
                'pelaku'=>'required'
                
            ],[
                'name.required'=>'Form Nama wajib di isi',
                'asal.required'=>'Form Asal Seni Tari wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul Thumbnail wajib di isi',
                'buatan.required'=>'Form buatan wajib di isi ',
                'pencipta.required'=>'Form pencipta wajib di isi',
                'pelaku.required'=>'Form Jumlah Pelaku wajib di isi',
            ]
            );

        $data=[
            'name'=>$request->name,
            'asal'=>$request->asal,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'buatan'=>$request->buatan,
            'pencipta'=>$request->pencipta,
            'pelaku'=>$request->pelaku,
            'rating'=>$request->rating,
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
            $foto_file->move(public_path('assets/img/foto_seni_tari'),$foto_data);

            $data_foto=seniTari::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_seni_tari').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        seniTari::where('id', $id)->update($data);
        return redirect()->route('seni_tari.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seniTari  $seniTari
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=seniTari::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_seni_tari').'/'.$data->foto);
        seniTari::where('id',$id)->delete();
        return redirect()->route('seni_tari.create')->with('success','Berhasil Delete Data');
    }
}
