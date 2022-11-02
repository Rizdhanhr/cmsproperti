<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class AdminPropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properti = DB::table('properti')
        ->join('kategori','kategori.id','properti.id_kategori')
        ->select('properti.*','kategori.nama as nama_kategori')
        ->get();
        return view ('admin.properti.index',compact('properti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properti = DB::table('properti')->get();
        $kategori = DB::table('kategori')->get();

        return view('admin.properti.create',compact('properti','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'luas' => 'required',
            'keunggulan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,png,jpeg' 
        ]);

        try{
                DB::transaction(function () use($request){
                   
                    if($file = $request->file('gambar')){
                        $nama_file = time()."_".$file->getClientOriginalName();
                        $tujuan_upload = 'data_file';
                        $file->move($tujuan_upload,$nama_file);
                        $barang = DB::table('properti')->insert([
                            'deskripsi' => $request->deskripsi,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'gambar' => $tujuan_upload.'/'.$nama_file,
                            'id_kategori' => $request->kategori,
                            'luas' => $request->luas,
                            'keunggulan' => $request->keunggulan,
                            'harga' => $request->harga,
                            'status' => 1
                        ]);
                    }
                });

                Alert::success('Sukses','Data Berhasil Ditambah');
                return redirect('/admin-properti');
        }catch(Exception $e){

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //
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
                    DB::table('properti')->where('id',$id)->delete();
                });
                Alert::success('Sukses','Data Berhasil Dihapus');
                return redirect()->back();
        }catch(Exception $e){
                Alert::error('Error','Data Gagal Dihapus');
                return redirect()->back();
        }
    }
}
