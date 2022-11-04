<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class OurServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('layanan')->get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'deskripsi' => 'required'
        ]);

       try{
        DB::transaction(function () use($request){
            DB::table('layanan')->insert([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
        });
        Alert::success('Sukses','Data Berhasil Ditambah');
        return redirect('admin-ourservices');
       }catch(Exception $e){
        Alert::error('Gagal','Data Gagal Ditambah');
        return redirect('admin-ourservices');
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
       $services = DB::table('layanan')->where('id',$id)->get();
       return view('admin.services.edit',compact('services'));
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
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

       try{
        DB::transaction(function () use($request,$id){
            DB::table('layanan')->where('id',$id)->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
        });
        Alert::success('Sukses','Data Berhasil Diubah');
        return redirect('admin-ourservices');
       }catch(Exception $e){
        Alert::error('Gagal','Data Gagal Diubah');
        return redirect('admin-ourservices');
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
            DB::transaction(function () use($id) {
                DB::table('layanan')->where('id',$id)->delete();
            });
            Alert::success('Sukses','Data Berhasil Dihapus');
            return redirect()->back();
        }catch(Exception $e){

        }
    }
}
