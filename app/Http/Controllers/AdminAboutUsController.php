<?php

namespace App\Http\Controllers;
use DB;
use Alert;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('about')->get();
        return view('admin.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'judul' => 'required|max:50',
            'deskripsi' => 'required_without:image',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        try{
            DB::transaction(function () use($request) {
                if($file = $request->file('gambar')){
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'data_file';
                    $file->move($tujuan_upload,$nama_file);
                    $barang = DB::table('about')->insert([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'judul' => $request->judul,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                }
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-about');
        }catch(Exception $e){
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
        $about = DB::table('about')->where('id',$id)->get();
        return view('admin.about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = DB::table('about')->where('id',$id)
        ->get();

        return view('admin.about.edit',compact('about'));
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
            'nama' => 'required|max:40',
            'judul' => 'required|max:50',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg'
        ]);

        try{
            DB::transaction(function  () use ($request,$id) {
                if($request->hasfile('gambar')){
                    $file = $request->file('gambar');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'data_file';
                    $file->move($tujuan_upload,$nama_file);
                    $slider = DB::table('about')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'judul' => $request->judul,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                  }else{
                    $slider = DB::table('about')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'nama' => $request->nama,
                        'judul' => $request->judul,
                    ]);
                    
                  }
            });
                    Alert::success('Sukses', 'Data Berhasil Diubah');
                    return redirect('admin-about');
           }catch(Exception $e){
                    Alert::error('Gagal', 'Data Gagal Diubah');
                    return redirect('admin-about');
    
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
                DB::table('about')->where('id',$id)->delete();

            });
            Alert::success('Sukses','Data Berhasil Dihapus');
            return redirect()->back();
        }catch(Exception $e){
            Alert::success('Gagal','Data GagalDihapus');
            return redirect()->back();
        }
    }
}
