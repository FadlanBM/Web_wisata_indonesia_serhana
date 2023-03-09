<?php

namespace App\Http\Controllers;

use App\Models\Trevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreTrevelRequest;
use App\Http\Requests\UpdateTrevelRequest;

class TrevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trevel = Trevel::orderBY('id', 'ASC')->paginate(1);
        return view('landing_page.travel')->with('travel', $trevel);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Trevel::orderBY('id','ASC')->paginate(6);
        return view('dashboard.travel')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('judul',$request->judul);
        Session::flash('desckription',$request->desckription);
        Session::flash('biaya',$request->biaya);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'name'=>'required',
                'judul'=>'required',
                'description'=>'required',
                'biaya'=>'required',
                
            ],[
                'foto.required'=>'Form foto wajib dimasukkan',
                'name.required'=>'Form Nama wajib di isi',
                'judul.required'=>'Form Judul wajib di isi',
                'description.required'=>'Form description wajib di isi',
                'biaya.required'=>'Form Biaya wajib di isi',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_travel'),$foto_data);

        $data=[
            'name'=>$request->name,
            'judul'=>$request->judul,
            'description'=>$request->description,
            'biaya'=>$request->biaya,
            'foto'=>$foto_data
        ];
        Trevel::create($data);
        return redirect()->route('travel.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trevel  $trevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $trevel = Trevel::where('id', $id)->first();
        return view('landing_page.show.Stravel')->with('trevel', $trevel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trevel  $trevel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Trevel::where('id',$id)->first();
        return view('dashboard.edit.travel_edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrevelRequest  $request
     * @param  \App\Models\Trevel  $trevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [   
                'name'=>'required',
                'judul'=>'required',
                'description'=>'required',
                'biaya'=>'required',
                
            ],[
                'name.required'=>'Form Nama wajib di isi',
                'judul.required'=>'Form judul wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'biaya.required'=>'Form Biaya wajib di isi',
            ]
            );

        $data=[
            'name'=>$request->name,
            'judul'=>$request->judul,
            'description'=>$request->description,
            'biaya'=>$request->biaya,
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
            $foto_file->move(public_path('assets/img/foto_travel'),$foto_data);

            $data_foto=Trevel::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_travel').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        Trevel::where('id', $id)->update($data);
        return redirect()->route('travel.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trevel  $trevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trevel $trevel,$id)
    {
        $data=Trevel::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_travel').'/'.$data->foto);
        Trevel::where('id',$id)->delete();
        return redirect()->route('travel.create')->with('success','Berhasil Delete Data');
    }
}
