<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class OurAgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = DB::table('agen')->get();
        return view('admin.agents.index',compact('agen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agents.create');
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
        'deskripsi' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'gambar' => 'required|image|mimes:png,jpg,jpeg',
        'whatsapp' => 'required',
        'facebook' => 'required',
        'instagram' => 'required'
       ]);

       try{
        DB::transaction(function () use($request) {
            if($file = $request->file('gambar')){
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'agen';
                $file->move($tujuan_upload,$nama_file);
                $barang = DB::table('agen')->insert([
                    'deskripsi' => $request->deskripsi,
                    'nama' => $request->nama,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'gambar' => $tujuan_upload.'/'.$nama_file
                ]);
            }
        });
        Alert::success('Sukses', 'Data Berhasil Ditambah');
        return redirect('admin-agents');
    }catch(Exception $e){
        Alert::error('Gagal', 'Data Gagal Ditambah');
        return redirect('admin-agents');
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
        $agents = DB::table('agen')->where('id',$id)->get();
        return view('admin.agents.edit',compact('agents'));
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
            'deskripsi' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
           ]);

           try{
            DB::transaction(function  () use ($request,$id) {
                if($request->hasfile('gambar')){
                    $file = $request->file('gambar');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'agen';
                    $file->move($tujuan_upload,$nama_file);
                    $agents = DB::table('agen')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                    'nama' => $request->nama,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                  }else{
                    $agents = DB::table('agen')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'whatsapp' => $request->whatsapp,
                        'facebook' => $request->facebook,
                        'instagram' => $request->instagram
                       
                    ]);
                    
                  }
            });
                    Alert::success('Sukses', 'Data Berhasil Diubah');
                    return redirect('admin-agents');
           }catch(Exception $e){
                    Alert::error('Gagal', 'Data Gagal Diubah');
                    return redirect('admin-agents');
    
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
                DB::table('agen')->where('id',$id)->delete();
            });
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->back();
        }catch(Exception $e){}
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect()->back();
    }
}
