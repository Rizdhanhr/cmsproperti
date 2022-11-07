<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PropertiController extends Controller
{
    public function index($id){

        // $kategori = DB::table('kategori')
        // ->join('properti','properti.id_kategori','kategori.id')
        // ->where('kategori.id',$id)
        // ->get(array(
        //     'kategori.*','properti.nama as nama_properti','properti.harga','properti.luas'
        // ));

        $properti = DB::table('properti')
        ->join('kategori','kategori.id','properti.id_kategori')
        ->select('properti.*','kategori.id as id_kategori','kategori.nama as nama_kategori')
        ->where('kategori.id',$id)
        ->paginate(10);

        // $judul = DB::table('properti')
        // ->join('kategori','kategori.id','properti.id_kategori')
        // ->select('properti.*','kategori.nama as nama_kategori')
        // ->where('kategori.id',$id)
        // ->limit(1)
        // ->get();
        // DD($properti);
        return view('properti.index',compact('properti'));
    }

    public function show($id){
        $detail = DB::table('properti')
        ->join('kategori','kategori.id','properti.id_kategori')
        ->select('properti.*','kategori.nama as nama_kategori')
        ->where('properti.id',$id)
        ->get();

        return view('properti.show',compact('detail'));
    }

       
}
