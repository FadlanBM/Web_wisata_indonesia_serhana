<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Index::orderBY('id', 'ASC')->paginate(1);
        return view('landing_page.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Index::orderBY('id','ASC')->paginate(6);
        return view('dashboard.index')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama',$request->nama);
        Session::flash('description',$request->pembuat);
        Session::flash('jabatan',$request->isi);
        Session::flash('twiter',$request->isi);
        Session::flash('youtube',$request->isi);
        Session::flash('facebook',$request->isi);
        $request->validate(
            [   
                'foto'=>'required|mimes:jpeg,jpg,png,gif',
                'nama'=>'required',
                'description'=>'required',
                'jabatan'=>'required',
                'twiter'=>'required',
                'youtube'=>'required',
                'facebook'=>'required',
                
            ],[
                'foto.required'=>'Form foto wajib dimasukkan',
                'nama.required'=>'Form Nama wajib di isi',
                'description.required'=>'Form Pembuat wajib di isi',
                'jabatan.required'=>'Form jabatan wajib di isi',
                'twiter.required'=>'Form Link Twiter wajib di isi',
                'youtube.required'=>'Form Link Youtube wajib di isi',
                'facebook.required'=>'Form Link Facebook di isi',
                'foto.mimes'=>'Foto yang dimasukkan hanya diperbolehkan berekstensi JPEG,JPG,PNG,GIF'
            ]
            );

            $foto_file=$request->file('foto');
            $foto_extensi=$foto_file->extension();
            $foto_data=date('ymdhis').".".$foto_extensi;
            $foto_file->move(public_path('assets/img/foto_index'),$foto_data);

        $data=[
            'nama'=>$request->nama,
            'description'=>$request->description,
            'jabatan'=>$request->jabatan,
            'twiter'=>$request->twiter,
            'youtube'=>$request->youtube,
            'facebook'=>$request->facebook,
            'foto'=>$foto_data
        ];
        Index::create($data);
        return redirect()->route('index.create')->with('success','Berhasil Menyimpan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data=Index::where('id',$id)->first();
        return view('dashboard.edit.index')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndexRequest  $request
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [   
                'nama'=>'required',
                'description'=>'required',
                'jabatan'=>'required',
                'twiter'=>'required',
                'youtube'=>'required',
                'facebook'=>'required',
                
            ],[
                'nama.required'=>'Form Nama wajib di isi',
                'description.required'=>'Form Description wajib di isi',
                'jabatan.required'=>'Form jabatan wajib di isi',
                'twiter.required'=>'Form Link Twiter wajib di isi',
                'youtube.required'=>'Form Link Youtube wajib di isi',
                'facebook.required'=>'Form Link Facebook wajib di isi',
            ]
            );

        $data=[
              'nama'=>$request->nama,
            'description'=>$request->description,
            'jabatan'=>$request->jabatan,
            'twiter'=>$request->twiter,
            'youtube'=>$request->youtube,
            'facebook'=>$request->facebook,
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
            $foto_file->move(public_path('assets/img/foto_index'),$foto_data);

            $data_foto=Index::where('id',$id)->first();
            File::delete(public_path('assets/img/foto_index').'/'.$data_foto->foto);

            // $data=[
            //     'foto'=>$foto_data
            // ];
            $data['foto']=$foto_data;
            }

        Index::where('id', $id)->update($data);
        return redirect()->route('index.create')->with('success','Berhasil Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Index::where('id',$id)->first();
        File::delete(public_path('assets/img/foto_index').'/'.$data->foto);
        Index::where('id',$id)->delete();
        return redirect()->route('index.create')->with('success','Berhasil Delete Data');
    }
}
