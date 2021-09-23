<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pegawaicontroler extends Controller
{
    public function tampilanawal(){
        $datanama = Session::get('active');
        $produk = produk::get('id_produk')->count();
        if ($produk>0) {
            $dataproduk['produkdata'] = produk::get();
            return view("indexkaryawan",["isi"=>1])->with($dataproduk);
        } else {
            return view("indexkaryawan",["isi"=>0]);
        }
        
        
        
    }
}
