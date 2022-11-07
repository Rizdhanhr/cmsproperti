<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
use App\Models\Blog;

class AdminArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = DB::table('blog')
                ->join('kategori_blog','kategori_blog.id','blog.id_kategori_blog')
                ->select('blog.*','kategori_blog.nama as nama_kategori')
                ->get();
        return view('admin.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_blog = DB::table('kategori_blog')->get();
        return view('admin.blog.create',compact('kategori_blog'));
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
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        try{
            DB::transaction(function () use($request) {
                if($file = $request->file('gambar')){
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'blog';
                    $file->move($tujuan_upload,$nama_file);
                    $barang = DB::table('blog')->insert([
                        'deskripsi' => $request->deskripsi,
                        'judul' => $request->judul,
                        'id_kategori_blog' => $request->kategori,
                        'gambar' => $tujuan_upload.'/'.$nama_file
                    ]);
                }
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-artikel');
        }catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Ditambah');
            return redirect('admin-artikel');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blog = DB::table('blog')->where('id',$id)->get();
        $kategori_blog = DB::table('kategori_blog')->get();
        return view('admin.blog.edit',compact('blog','kategori_blog'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg'
        ]);
        try{
            DB::transaction(function  () use ($request,$id) {
                if($request->hasfile('gambar')){
                    $file = $request->file('gambar');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $tujuan_upload = 'blog';
                    $file->move($tujuan_upload,$nama_file);
                    $blog = DB::table('blog')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'judul' => $request->judul,
                        'id_kategori_blog' => $request->kategori,
                        'gambar' => $tujuan_upload.'/'.$nama_file,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                  }else{
                    $blog = DB::table('blog')->where('id',$id)->update([
                        'deskripsi' => $request->deskripsi,
                        'judul' => $request->judul,
                        'id_kategori_blog' => $request->kategori,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    
                  }
            });
            Alert::success('Sukses', 'Data Berhasil Diupdate');
            return redirect('admin-artikel');
           }catch(Exception $e){
            Alert::error('Gagal', 'Data Gagal Ditambah');
            return redirect('admin-artikel');
    
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
                DB::table('blog')->where('id',$id)->delete();
            });

            Alert::success('Sukses','Data Berhasil Disimpan');
            return redirect()->back();
        }catch(Exception $e){
            Alert::error('Gagal','Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
