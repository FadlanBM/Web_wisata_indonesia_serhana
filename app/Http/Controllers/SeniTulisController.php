<?php

namespace App\Http\Controllers;

use App\Models\SeniTulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreSeniTulisRequest;
use App\Http\Requests\UpdateSeniTulisRequest;

class SeniTulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $seniTulis = SeniTulis::orderBY('id', 'ASC')->paginate();
        return view('landing_page.kearifan_tulis')->with('seniTulis', $seniTulis);
    }

    public function detail($id)
    {
        // return "<h1>Halo saya dari controller $id</h1>";
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=SeniTulis::orderBY('id','ASC')->paginate(6);
        return view('dashboard.seni_tulis')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeniTulisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('asal',$request->asal);
        Session::flash('description',$request->description);
        Session::flash('judul',$request->judul);
        Session::flash('buatan',$request->buatan);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'name'=>'required',
                'asal'=>'required',
                'description'=>'required',
                'judul'=>'required',
                'buatan'=>'required',
                
            ],[
                'foto.required'=>'Form Foto wajib dimasukkan',
                'name.required'=>'Form Nama wajib di isi',
                'asal.required'=>'Form Asal Seni Tari wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul Thumbnail wajib di isi',
                'buatan.required'=>'Form buatan wajib di isi ',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_seni_tulis'),$foto_data);

        $data=[
            'name'=>$request->name,
            'asal'=>$request->asal,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'buatan'=>$request->buatan,
            'rating'=>$request->rating,
            'foto'=>$foto_data
        ];
        SeniTulis::create($data);
        return redirect()->route('seni_tulis.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeniTulis  $seniTulis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $senitulis = SeniTulis::where('id', $id)->first();
        return view('landing_page.show.SseniTulis')->with('senitulis', $senitulis);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeniTulis  $seniTulis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=SeniTulis::where('id',$id)->first();
        return view('dashboard.edit.seni_tulis_edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeniTulisRequest  $request
     * @param  \App\Models\SeniTulis  $seniTulis
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
                
            ],[
                'name.required'=>'Form Nama wajib di isi',
                'asal.required'=>'Form Asal Seni Tari wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'judul.required'=>'Form Judul Thumbnail wajib di isi',
                'buatan.required'=>'Form buatan wajib di isi ',
            ]
            );

        $data=[
              'name'=>$request->name,
            'asal'=>$request->asal,
            'description'=>$request->description,
            'judul'=>$request->judul,
            'buatan'=>$request->buatan,
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
            $foto_file->move(public_path('assets/img/foto_seni_tulis'),$foto_data);

            $data_foto=SeniTulis::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_seni_tulis').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        SeniTulis::where('id', $id)->update($data);
        return redirect()->route('seni_tulis.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeniTulis  $seniTulis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=SeniTulis::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_seni_tulis').'/'.$data->foto);
        SeniTulis::where('id',$id)->delete();
        return redirect()->route('seni_tulis.create')->with('success','Berhasil Delete Data');
    }
}
