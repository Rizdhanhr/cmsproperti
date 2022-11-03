<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Alert;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contact')->get();
        return view('admin.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'deskripsi' => 'required',
            'nomor' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ]);
        try{
            DB::transaction(function () use($request) {
                DB::table('contact')->insert([
                    'deskripsi' => $request->deskripsi,
                    'nomor' => $request->nomor,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'alamat' => $request->alamat
                ]);
             
            });
            Alert::success('Sukses', 'Data Berhasil Ditambah');
            return redirect('admin-contact');
        }catch(Exception $e){
        
            return redirect('/admin-contact');
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
        $contact = DB::table('contact')->where('id',$id)->get();
        return view('admin.contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = DB::table('contact')->where('id',$id)->get();
        return view('admin.contact.edit',compact('contact'));
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
            'deskripsi' => 'required',
            'nomor' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ]);
        try{
            DB::transaction(function () use($request,$id) {
                DB::table('contact')
                ->where('id',$id)
                ->update([
                    'deskripsi' => $request->deskripsi,
                    'nomor' => $request->nomor,
                    'email' => $request->email,
                    'whatsapp' => $request->whatsapp,
                    'alamat' => $request->alamat
                ]);
             
            });
            Alert::success('Sukses', 'Data Berhasil Ubah');
            return redirect('admin-contact');
        }catch(Exception $e){
        
            return redirect('/admin-contact');
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
        //
    }
}
