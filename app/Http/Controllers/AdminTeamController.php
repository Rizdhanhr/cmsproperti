<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = DB::table('team')->get();
        return view('admin.team.index',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            'nama' => 'required|max:40',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        try{
            DB::transaction(function () use($request) {
                if($file = $request->file('gambar')){
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'data_file';
                    $file->move($tujuan_upload,$nama_file);
                    $barang = DB::table('team')->insert([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                }
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-team');
        }catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Ditambah');
            return redirect('admin-team');
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
        $team= DB::table('team')->where('id',$id)->get();
        return view('admin.team.show',compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = DB::table('team')->where('id',$id)->get();
        return view('admin.team.edit',compact('team'));
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
            'phone' => 'required|numeric',
            'deskripsi' => 'required',
            'email' => 'required',
            'gambar' => 'image|mimes:png,jpeg,jpg'
        ]);
        try{
            DB::transaction(function  () use ($request,$id) {
                if($request->hasfile('gambar')){
                    $file = $request->file('gambar');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'data_file';
                    $file->move($tujuan_upload,$nama_file);
                    $slider = DB::table('team')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                  }else{
                    $slider = DB::table('team')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'phone' => $request->phone,
                        'email' => $request->email
                    ]);
                    
                  }
            });
                    Alert::success('Sukses', 'Data Berhasil Diubah');
                    return redirect('admin-team');
           }catch(Exception $e){
                    Alert::error('Gagal', 'Data Gagal Diubah');
                    return redirect('admin-team');
    
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
                DB::table('team')->where('id',$id)->delete();
            });
            
            Alert::success('Sukses','Data Berhasil Dihapus');
            return redirect()->back();
        }catch(Exception $e){
            Alert::danger('Gagal','Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
