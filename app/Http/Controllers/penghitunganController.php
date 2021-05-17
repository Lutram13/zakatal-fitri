<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mustahik;
use App\Models\muzakkiBeras;
use App\Models\muzakkiUang;
use App\Models\golongan;
use App\Models\beliberas;
use DataTables;
use Validator;
use Alert;

class penghitunganController extends Controller
{
    public function index()
    {
        $data_mustahik = mustahik::get();
        $nama_golongan = golongan::query()->groupBy('nama')->pluck('nama');
        $golongan = golongan::query()->groupBy('id')->pluck('id');

        $jumlahBeras = muzakkiBeras::query()->sum('jumlahBeras');
        $jumlahMuzzakiBeras = muzakkiBeras::query()->count();
        $jumlahUang = muzakkiUang::query()->sum('jumlahUang');
        $jumlahMuzzakiUang = muzakkiUang::query()->count();
        // return $info_mustahik;

        $jumlah_beliberas = beliberas::query()->sum('jumlah');
        $harga_beliberas = beliberas::query()->sum('harga');
    
        $tot_beras =$jumlahBeras + $jumlah_beliberas;
        $tot_uang =$jumlahUang - $harga_beliberas;

        $golongan_NNull = [];

        $i = 0;
        foreach ($golongan as $gol) {
            $jumlah = mustahik::where('golongan_id', $gol)->count();
            $anggota = mustahik::where('golongan_id', $gol)->pluck('id');
            $nama = golongan::query()
            ->where('id', '=', $gol)
            ->select('nama')
            ->first();
            if ($jumlah > 0) {
                $info_mustahik[$i]['id'] = $gol;            
                $info_mustahik[$i]['nama'] = $nama->nama;            
                $info_mustahik[$i]['jumlah'] = $jumlah;
                $info_mustahik[$i]['anggota'] = $anggota;
                $golongan_NNull[] = $info_mustahik[$i]['nama'];
            }
            $i++;
        }             

        $list = count($info_mustahik);  
        $BerasKelompok = $tot_beras/$list ;        
        $UangKelompok = $tot_uang/$list ;        
        
        $i = 0;
        foreach ($golongan as $gol) {
            $BerasOrang = 0;

            $jumlah = mustahik::where('golongan_id', $gol)->count();
            if ($jumlah > 0) {
                $BerasOrang = $BerasKelompok/$jumlah;
                $UangOrang = $UangKelompok/$jumlah;
                $info_mustahik[$i]['beras'] = $BerasOrang ;  
                $info_mustahik[$i]['uang'] = $UangOrang ;  
            }
            $i++;
        }       

        return view('page.penghitungan.index', [
            'jumlahBeras' => $jumlahBeras,'jumlahMuzzakiBeras'=>$jumlahMuzzakiBeras,
            'jumlahUang' => $jumlahUang,'jumlahMuzzakiUang'=>$jumlahMuzzakiUang,
            'data_mustahik' => $data_mustahik, 'info_mustahik' => $info_mustahik,
            'golongan' => $nama_golongan, 
            'jumlah_beliberas' => $jumlah_beliberas, 'harga_beliberas' => $harga_beliberas, 
            'tot_beras' => $tot_beras, 'tot_uang' => $tot_uang, 
            'BerasKelompok' => $BerasKelompok, 'UangKelompok' => $UangKelompok, 
            'list' => $list, 'golongan_NNull' => $golongan_NNull,
            ]);
        return view('page.penghitungan.index');
    }
    public function update(Request $request)
    {
        $golongan = golongan::query()->groupBy('id')->pluck('id');        
        
        foreach ($golongan as $gol) {
            $jumlah = mustahik::where('golongan_id', $gol)->count();
            if ($jumlah > 0) {
                $golongan = golongan::find($gol);
                if ($request->{"beras_" . $gol} !== null) {
                    $golongan->jumlahBeras = $request->{"beras_" . $gol};                
                };
                if ($request->{"uang_" . $gol} !== null) {
                    $golongan->jumlahUang = $request->{"uang_" . $gol};                
                };
                $golongan->save();
                
            }
        }             

        // $list = count($info_mustahik);  

        // $flight = App\Flight::find(1);

        // $flight->name = 'New Flight Name';
        
        // $flight->save();


        return redirect()->route('beranda');

        // return $yuhu;

        // DB::transaction(function () use ($golongan, $request) {
        //     foreach ($golongan as $gol) {
                
        //     }
        // )};
    }
    public function create(Request $request){
        
        $golongan = golongan::query()->groupBy('id')->pluck('id');
        // $golongan = ['aku','kamu', 'dia'];

        // $itu_aku = 100;
        // $itu_kamu = 200;
        // $itu_dia = 300;
        foreach ($golongan as $gol) {
            $model = golongan::findOrFail($gol);
            
            echo $model->nama ;
        }
    }
}
