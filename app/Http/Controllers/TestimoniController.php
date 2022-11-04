<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = DB::table('testimoni')->get();
        return view('admin.testimoni.index',compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'nama' => 'required|max:40',
         
        ]);

        try{
            DB::transaction(function () use ($request){
                
                if($file = $request->file('gambar')){
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'testimoni';
                    $file->move($tujuan_upload,$nama_file);
                    $barang = DB::table('testimoni')->insert([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                }
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-testimoni');
           } catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Ditambah');
            return redirect('admin-testimoni');
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimoni = DB::table('testimoni')->where('id',$id)->get();
        return view('admin.testimoni.show',compact('testimoni'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimoni = DB::table('testimoni')->where('id',$id)->get();
        return view('admin.testimoni.edit',compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'deskripsi' => 'required|max:50',
            'nama' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg'
        ]);

       try{
        DB::transaction(function  () use ($request,$id) {
            if($request->hasfile('gambar')){
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'testimoni';
                $file->move($tujuan_upload,$nama_file);
                $testimoni = DB::table('testimoni')->where('id',$id)->update([
                    'deskripsi' => $request->deskripsi,
                    'nama' => $request->nama,
                    'gambar' => $tujuan_upload.'/'.$nama_file
                ]);
              }else{
                $testimoni = DB::table('testimoni')->where('id',$id)->update([
                    'deskripsi' => $request->deskripsi,
                    'nama' => $request->nama
          
                ]);
                
              }
        });
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect('admin-testimoni');
       }catch(Exception $e){
        Alert::error('Gagal', 'Data Gagal Diubah');
                    return redirect('admin-testimoni');;

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::transaction(function () use($id){
                DB::table('testimoni')->where('id',$id)->delete();
            });

            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->back();
        }catch(Exception $e){

        };
    }
}
