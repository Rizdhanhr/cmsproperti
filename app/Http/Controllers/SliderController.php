<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('slider')->get();
        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'deskripsi' => 'required|max:40',
            'alamat' => 'required|max:40',
            'harga' => 'required|max:40'
        ]);

        try{
            DB::transaction(function () use ($request){
                
                if($file = $request->file('gambar')){
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'data_file';
                    $file->move($tujuan_upload,$nama_file);
                    $barang = DB::table('slider')->insert([
                        'deskripsi' => $request->deskripsi,
                        'alamat' => $request->alamat,
                        'harga' => $request->harga,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                }
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-slider');
           } catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Ditambah');
            return redirect('admin-slider');
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
        $slider = DB::table('slider')
        ->where('id',$id)
        ->get();
        return view('admin.slider.edit',compact('slider'));
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
            'deskripsi' => 'required|max:40',
            'harga' => 'required|max:40',
            'alamat' => 'required|max:40',
            'gambar' => 'image|mimes:png,jpg,jpeg'
        ]);

       try{
        DB::transaction(function  () use ($request,$id) {
            if($request->hasfile('gambar')){
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$nama_file);
                $slider = DB::table('slider')->where('id',$id)->update([
                    'deskripsi' => $request->deskripsi,
                    'harga' => $request->harga,
                    'alamat' => $request->alamat,
                    'gambar' => $tujuan_upload.'/'.$nama_file
                ]);
              }else{
                $slider = DB::table('slider')->where('id',$id)->update([
                    'deskripsi' => $request->deskripsi,
                    'harga' => $request->harga,
                    'alamat' => $request->alamat
                ]);
                
              }
        });
                Alert::success('Sukses', 'Data Berhasil Diubah');
                return redirect('admin-slider');
       }catch(Exception $e){
                Alert::error('Gagal', 'Data Gagal Diubah');
                return redirect('admin-slider');

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
                DB::table('slider')->where('id',$id)->delete();
            });
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->back();
        }catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
