<?php

namespace App\Http\Controllers;

use App\pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class maincontroler extends Controller
{
    function logout(Request $req){
        Session::remove('active');
        Session::remove('loginadmin');
        Session::remove('loginkaryawan');
        Session::remove('loginowner');
        return \redirect("/");
    }

    function logcheck(Request $req){
        $validateData = $req->validate(
            [
                "username"=>"required",
                "password"=>"required"
            ],
            [
                "required"=>"Attribut tidak boleh kosong",
                "password"=>"salahh"
            ]
        );
        //untuk cek hashing password
        // $datapass = pegawai::select('password')->where('username',$req->username)->first();
        // $pass = $datapass->password;
       
        
        // $hash = Hash::make($pass);
        // $passbaru = "783100";

        // if(Hash::check($req->password,$hash)){
        //     return "sama";
        // }
        // else{
        //     return "tidak sama";
        // }

        if(Session::has('loginkaryawan')){
            return \redirect("pegawai/karyawan");
        }
        if(Session::has('loginadmin')){
            return \redirect("admin");
        }
        if(Session::has("loginowner")){
            return \redirect("owner");
        }
        else
        {
            $nama = $req->username;
            $password = $req->password;
            $passworduser = pegawai::select('password')->where('username',$nama)->first();
            if(Hash::check($password,$passworduser->password)){
               
                $pegawailogin = pegawai::Select('jabatan')->Where('username',$nama)->first();
                if ($pegawailogin->jabatan=="pegawai") {
                    $namapeg = pegawai::Select('nama')->Where('username',$nama)->first();
                    $namapegawai = $namapeg->nama;
                    Session::put('active',$namapegawai);
                    Session::put('loginkaryawan','masuk');
                    return \redirect("pegawai/karyawan");
                } else if($pegawailogin->jabatan=="admin"){
                    
                }
                else if($pegawailogin->jabatan=="owner"){
                    $namapeg = pegawai::Select('nama')->Where('username',$nama)->first();
                    $namapegawai = $namapeg->nama;
                    Session::put('active',$namapegawai);
                    Session::put('loginowner','masuk');
                    return \redirect("owner/indexowner");
                    
                }
            }
            else{
                return redirect("/");
            }
        
            
        }
        

        
        
    }
}
