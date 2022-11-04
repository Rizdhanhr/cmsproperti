<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class AdminKategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorib = DB::table('kategori_blog')->get();
        return view('admin.kategoriblog.index',compact('kategorib'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoriblog.create');
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
            'nama'=> 'required'
        ]);

        try{

            DB::transaction(function () use ($request){
                DB::table('kategori_blog')->insert([
                    'nama' => $request->nama
                ]);
            });

            Alert::success('Sukses','Data Berhasil Disimpan');
            return redirect('/admin-artikel-kategori');
        }catch(Exception $e){
           
            return redirect('/admin-artikel-kategori');
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
        $kategorib = DB::table('kategori_blog')->where('id',$id)->get();
        return view('admin.kategoriblog.edit',compact('kategorib'));
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
            'nama' => 'required'
        ]);

        try{
            DB::transaction(function () use($request,$id){
                DB::table('kategori_blog')->where('id',$id)->update([
                    'nama' => $request->nama
                ]);
            });
            Alert::success('Sukses','Data Berhasil Diubah');
            return redirect('/admin-artikel-kategori');
        }catch(Exception $e){

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
                DB::transaction(function () use ($id){
                    DB::table('kategori_blog')->where('id',$id)->delete();
                });
                Alert::success('Sukses','Data Berhasil Dihapus');
                return redirect()->back();
        }catch(Exception $e){
                return redirect()->back();  
        }
    }
}
