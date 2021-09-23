<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\produk;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ownercontroler extends Controller
{
    //

    public function indexowner(){
        $datanama = Session::get('active');
        return view("indexowner");
    }

    public function listkaryawan(){

        $countkaryawan = pegawai::get()->whereNotIn("jabatan","owner")->count();
        if($countkaryawan>0){
            $datakaryawan['datakaryawan'] = pegawai::get()->whereNotIn("jabatan","owner"); 
            return view("karyawanlist",["isi"=>1])->with($datakaryawan);
            
        }
        else{
            return view("karyawanlist",["isi"=>0]);
            
        }

        
    }

    //function register

    public function regcheck(Request $req){

        $validasi = $req->validate(
        [
            'password_repeat'=>'same:password'
        ],
        [
            'password_repeat'=>'harus sama dengan password'
        ]);
        
        $pass = $req->password;
        $cpass = $req->password_repeat;

        if($pass == $cpass){
            $nama = $req->nama;
            $email = $req->email;
            $alamat = $req->alamat;
            $telephone = $req->nomor_hp;
            $jabatan = $req->jabatan;
            $username = $req->username;
            $data = pegawai::where('nama',$nama)->count();
            if($data<=0){
                $userbaru = new pegawai;
                $userbaru->username = $username;
                $passbaru = Hash::make($pass);
                $userbaru->password = $passbaru;
                $userbaru->nama = $nama;
                $userbaru->alamat = $alamat;
                $userbaru->email = $email;
                $userbaru->telephone = $telephone;
                $userbaru->jabatan = $jabatan;
                $userbaru->status = 1;
                $userbaru->save();
                return redirect("/owner/listkaryawan");
            }

        }
        
    }

    //disabled pegawai

    public function disablepegawai($id){
        pegawai::where('id_user',$id)->update(['status'=>'0']);
        return redirect("/owner/listkaryawan");
    }

    public function aktifpegawai($id){
        pegawai::where('id_user',$id)->update(['status'=>'1']);
        return redirect("/owner/listkaryawan");
    }


    public function cekstok(){
        $countproduk = produk::get()->count();
        if($countproduk>0){
            $dataproduk['dataproduk'] = produk::get();
            return view('stokbarang',["isi"=>1])->with($dataproduk);
        }
        else{
            return view('stokbarang',["isi"=>0]);
        }
    }

    //disable produk
    public function disableproduk($id){
        produk::where('id_produk',$id)->update(['status'=>0]);
        return redirect('/owner/stokbarang');
    }
    //aktifproduk
    public function aktifproduk($id){
        produk::where('id_produk',$id)->update(['status'=>1]);
        return redirect('/owner/stokbarang');
    }


    //hapus produk
    public function hapusproduk($id){
        produk::where('id_produk',$id)->delete();
        return redirect('/owner/stokbarang');
    }

    public function updateproduk($id){

    }
}
