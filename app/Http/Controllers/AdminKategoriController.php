<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'nama' => 'required|max:20'
        ]);

       try{
        DB::transaction(function () use ($request){
            
            DB::table('kategori')->insert([
                'nama' => $request->nama
            ]);
        });
        Alert::success('Sukses', 'Data Berhasil Ditambah');
        return redirect('admin-kategori');
       } catch(Exception $e){
        Alert::error('Gagal', 'Data Gagal Ditambah');
        return redirect('admin-kategori');
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
        $kategori = DB::table('kategori')->where('id',$id)->get();
        return view('admin.kategori.edit',compact('kategori'));
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
        try{
            DB::transaction(function () use ($request, $id){
                
                DB::table('kategori')->where('id',$id)->update([
                    'nama' => $request->nama
                ]);
            });
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect('admin-kategori');
           } catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect('admin-kategori');
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
                
                DB::table('kategori')->where('id',$id)->delete();
            });
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->back();
           } catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect()->back();
           }
    }
}
