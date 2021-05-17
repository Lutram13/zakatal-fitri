<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mustahik;
use App\Models\muzakkiBeras;
use App\Models\muzakkiUang;
use App\Models\golongan;
use App\Models\beliberas;

class berandaController extends Controller
{
    public function index()
    {
        $mustahik = mustahik::query()
            ->join('golongans', 'golongans.id', '=', 'mustahiks.golongan_id')  
            ->select(
                'mustahiks.nama as nama',
                'golongans.nama as golongan', 'golongans.jumlahBeras', 'golongans.jumlahUang',
                )
            ->get();
    
        $golongan = golongan::query()->groupBy('id')->pluck('id'); 
        $golongan_NNull= [];

        $i = 0;
        foreach ($golongan as $gol) {
            $jumlah = mustahik::where('golongan_id', $gol)->count();
            $beras = golongan::query()
            ->where('id', $gol)
            ->select('jumlahBeras')
            ->first();
            $nama = golongan::query()
            ->where('id', '=', $gol)
            ->select('nama')
            ->first();
            if ($jumlah > 0) {
                $info_mustahik[$i]['id'] = $gol;            
                $info_mustahik[$i]['nama'] = $nama->nama;     
                $info_mustahik[$i]['jumlah'] = $jumlah;     
                $info_mustahik[$i]['beras'] = $beras->jumlahBeras;     
                $golongan_NNull[] = $nama->nama;
            }
            $i++;
        }  
        // return  $info_mustahik;

        $jum_kelompok = count($golongan_NNull);

        $data = [];
        $jum_data = count($mustahik);    
        for ($i=0; $i < $jum_kelompok; $i++) { 
            $nama = $golongan_NNull[$i];

            $data[$i]['name'] = 'golongan '. $nama;
            for ($j=0; $j <$jum_data ; $j++) { 
                $value =0;
                if ($nama == $mustahik[$j]['golongan']) {
                    if ($mustahik[$j]['jumlahBeras'] !== null){
                        $value = $mustahik[$j]['jumlahBeras'];
                    }
                    else{
                        $value = 1;
                    }
                    $data[$i]['data'][] = array(
                        "name" => $mustahik[$j]['nama'],
                        "value" => $value
                    );                        
                }
            }

        }
        $categories = ["3","4","5","6","7","8","9","10",null];
        // $beras = muzakkiBeras::query()->groupBy('rt')->pluck('rt');
        $muzakki[0]['name'] = "Muzakki Beras";
        for ($i=0; $i < count($categories); $i++) {             
            $jumlah = muzakkiBeras::where('rt', $categories[$i])->count();

            $muzakki[0]['data'][] = $jumlah;            
        }

        $muzakki[1]['name'] = "Muzakki Uang";
        for ($i=0; $i < count($categories); $i++) {             
            $jumlah = muzakkiUang::where('rt', $categories[$i])->count();

            $muzakki[1]['data'][] = $jumlah;            
        }

        $jumlahBeras = muzakkiBeras::query()->sum('jumlahBeras');
        $jumlahMuzzakiBeras = muzakkiBeras::query()->count();
        $jumlahUang = muzakkiUang::query()->sum('jumlahUang');
        $jumlahMuzzakiUang = muzakkiUang::query()->count();
        $jumlah_beliberas = beliberas::query()->sum('jumlah');
        $harga_beliberas = beliberas::query()->sum('harga');
        $total_beras = $jumlahBeras+$jumlah_beliberas ;        
        $total_uang =$jumlahUang - $harga_beliberas;

        // return dd($info_mustahik);
        return view('page.beranda', [
            'data' => array_values($data),
            'muzakki' => array_values($muzakki),
            'info_mustahik' => $info_mustahik,
            'jum_kelompok' => $jum_kelompok, 'harga_beliberas' => $harga_beliberas,
            'total_beras' => $total_beras, 'total_uang' => $total_uang,
            'jumlahBeras' => $jumlahBeras,'jumlahMuzzakiBeras'=>$jumlahMuzzakiBeras,
            'jumlahUang' => $jumlahUang,'jumlahMuzzakiUang'=>$jumlahMuzzakiUang,
            'jumlah_beliberas' => $jumlah_beliberas, 
            ]);
    }
}
