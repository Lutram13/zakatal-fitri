<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\mustahik;
use App\Models\golongan;
use App\Exports\mustahikExport;
use App\Imports\mustahikImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Validator;
use Alert;
use Session;

class mustahikController extends Controller
{
    public function index()
    {
        return view('page.mustahik.index');
    }

    public function create()
    {
        $model = new mustahik();
        return view('page.mustahik.form', compact('model'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'golongan' => 'required',
        ]);
    
        
        $gols = golongan::query()
            ->where('nama', '=', $request->golongan)
            ->first();
        
        if($gols){
            $model = DB::transaction(function () use ($gols, $request) {
                $mustahik = mustahik::create([
                    'golongan_id' => $gols->id,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'keterangan' => $request->keterangan,
                ]);
            });
        }    
        else{            
            $model = DB::transaction(function () use ($request) {
                $golongan = golongan::create([
                    'nama' => $request->golongan,
                    'jumlahBeras' => 0,
                    'jumlahUang' => 0.0,
                ]);
                $mustahik = mustahik::create([
                    'golongan_id' => $golongan->id,
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'keterangan' => $request->keterangan,
                ]);
            });
        }

        
        return $model;
    }

    public function show($id)
    {
        // $model = mustahik::findOrFail($id);
        $model = mustahik::query()
            ->where('mustahiks.id', '=', $id)
            ->join('golongans', 'golongans.id', '=', 'golongan_id')
            ->select(('golongans.nama AS golongan'), 'jumlahBeras', 'jumlahUang',
                    'mustahiks.id', 'mustahiks.nama', 'alamat', 'keterangan')
            ->whereNull('mustahiks.deleted_at')
            ->first();
        return view('page.mustahik.show', compact('model'));
    }

    public function edit($id)
    {
        
        $model = mustahik::query()
            ->where('mustahiks.id', '=', $id)
            ->join('golongans', 'golongans.id', '=', 'golongan_id')
            ->select(('golongans.nama AS golongan'), 'jumlahBeras', 'jumlahUang',
                    'mustahiks.id', 'mustahiks.nama', 'alamat', 'keterangan')
            ->whereNull('mustahiks.deleted_at')
            ->first();

        // return $model;
        return view('page.mustahik.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'golongan' => 'required',
        ]);

        $golongan = golongan::query()
            ->where('nama', '=', $request->golongan)
            ->first();
        
        if($golongan){
            $model = mustahik::findOrFail($id);
            $model->nama = $request->nama;            
            $model->alamat = $request->alamat;
            $model->keterangan = $request->keterangan;
            $model->golongan_id = $golongan->id;

            $model->save();
        }    
        else{
            $golongan = golongan::create([
                'nama' => $request->golongan,
                'jumlahBeras' => 0,
                'jumlahUang' => 0.0,
            ]);
            
            $model = mustahik::findOrFail($id);
            $model->nama = $request->nama;            
            $model->alamat = $request->alamat;
            $model->keterangan = $request->keterangan;
            $model->golongan_id = $golongan->id;

            $model->save();
        }

        // return $isi;

        // $model = mustahik::findOrFail($id);

        // // $model->update($request->all());
        // $model->nama = $request->nama;
        // $model->alamat = $request->alamat;
        // $model->keterangan = $request->keterangan;

        // $model->save();

        return view('page.mustahik.index', compact('model'));
    }

    public function destroy($id)
    {
        $model = mustahik::findOrFail($id);
        $model->delete();
    }

    public function dataTableMustahik()
    {
        // return 'Ini table';
        $model = mustahik::query()
            ->join('golongans', 'golongans.id', '=', 'golongan_id')
            ->select(('golongans.nama AS golongan'), 'jumlahBeras', 'jumlahUang',
                    'mustahiks.id', 'mustahiks.nama', 'alamat', 'keterangan')
            ->whereNull('mustahiks.deleted_at')
            ->orderBy('alamat', 'desc')
            ->get();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page._action', [
                    'model' => $model,
                    'url_show' => route('mustahik.show', $model->id),
                    'url_edit' => route('mustahik.edit', $model->id),
                    'url_destroy' => route('mustahik.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function exportMustahik() 
    {
        $tanggal = date('d-m-Y');
        $nama_file = $tanggal.'_mustahik_uang.xlsx';
        return Excel::download(new mustahikExport, $nama_file);
    }
    public function importMustahik(Request $request) 
    {
        $tanggal = date('d-m-Y');

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = $tanggal.'_'.$file->getClientOriginalName();

		// upload ke folder file_pelanggan di dalam folder public
		$file->move('mustahik_data',$nama_file);

		// import data
		Excel::import(new mustahikImport, public_path('/mustahik_data/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Mustahik  Berhasil Diimport!');

		// alihkan halaman kembali
        return back();
    }
}
