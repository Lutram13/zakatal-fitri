<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\muzakkiBeras;
use App\Models\muzakkiUang;
use DataTables;
use Validator;
use Alert;
use App\Exports\muzakkiBerasExport;
use App\Imports\muzakkiBerasImport;
use App\Exports\muzakkiUangExport;
use App\Imports\muzakkiUangImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;


class muzakkiController extends Controller

{
    public function index()
    {
        $jumlahBeras = muzakkiBeras::query()->sum('jumlahBeras');
        $jumlahMuzzakiBeras = muzakkiBeras::query()->count();
        $jumlahUang = muzakkiUang::query()->sum('jumlahUang');
        $jumlahMuzzakiUang = muzakkiUang::query()->count();
        return view('page.muzakki.index', [
            'jumlahBeras' => $jumlahBeras,'jumlahMuzzakiBeras'=>$jumlahMuzzakiBeras,
            'jumlahUang' => $jumlahUang,'jumlahMuzzakiUang'=>$jumlahMuzzakiUang
            ]);
    }

    
    // Muzakki Beras
    public function createBeras()
    {
        $model = new muzakkiBeras();
        return view('page.muzakki.beras_form', compact('model'));
    }

    public function storeBeras(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'rt' => 'required',
            'jumlahBeras' => 'required',
        ]);

        $model = muzakkiBeras::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'jumlahBeras' => $request->jumlahBeras,
                'keterangan' => $request->keterangan,
            ]);
        return $model;
    }

    public function showBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        return view('page.muzakki.beras_show', compact('model'));
    }

    public function editBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        return view('page.muzakki.beras_form', compact('model'));
    }

    public function updateBeras(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'rt' => 'required',
            'jumlahBeras' => 'required',
        ]);

        $model = muzakkiBeras::findOrFail($id);

        $model->update($request->all());
        return view('page.muzakki.index', compact('model'));
    }

    public function destroyBeras($id)
    {
        $model = muzakkiBeras::findOrFail($id);
        $model->delete();
    }    

    public function dataTableMuzakkiBeras()
    {
        // return 'Ini table';
        $model = muzakkiBeras::query()
            ->orderBy('rt', 'desc');

        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page._action', [
                    'model' => $model,
                    'url_show' => route('muzakki.beras.show', $model->id),
                    'url_edit' => route('muzakki.beras.edit', $model->id),
                    'url_destroy' => route('muzakki.beras.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }


    // Muzakki Uang
    public function createUang()
    {
        $model = new muzakkiUang();
        return view('page.muzakki.Uang_form', compact('model'));
    }

    public function storeUang(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'rt' => 'required',
            'jumlahUang' => 'required',
        ]);

        $model = muzakkiUang::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'jumlahUang' => $request->jumlahUang,
                'keterangan' => $request->keterangan,
            ]);
        return $model;
    }

    public function showUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        return view('page.muzakki.uang_show', compact('model'));
    }

    public function editUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        return view('page.muzakki.uang_form', compact('model'));
    }

    public function updateUang(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'rt' => 'required',
            'jumlahUang' => 'required',
        ]);

        $model = muzakkiUang::findOrFail($id);

        $model->update($request->all());
        return view('page.muzakki.index', compact('model'));
    }

    public function destroyUang($id)
    {
        $model = muzakkiUang::findOrFail($id);
        $model->delete();
    }    

    public function dataTableMuzakkiUang()
    {
        // return 'Ini table';
        $model = muzakkiUang::query()
        ->orderBy('rt', 'desc');
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page._action', [
                    'model' => $model,
                    'url_show' => route('muzakki.uang.show', $model->id),
                    'url_edit' => route('muzakki.uang.edit', $model->id),
                    'url_destroy' => route('muzakki.uang.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function exportMuzakkiBeras() 
    {
        $tanggal = date('d-m-Y');
        $nama_file = $tanggal.'_muzakki_beras.xlsx';
        return Excel::download(new muzakkiBerasExport, $nama_file);
    }
    public function importMuzakkiBeras(Request $request) 
    {
        $tanggal = date('d-m-Y');

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = $tanggal.'_'.$file->getClientOriginalName();

		// upload ke folder file_pelanggan di dalam folder public
		$file->move('muzakki_beras',$nama_file);

		// import data
		Excel::import(new muzakkiBerasImport, public_path('/muzakki_beras/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Muzakki Beras Berhasil Diimport!');

		// alihkan halaman kembali
        return back();
    }

    public function exportMuzakkiUang() 
    {
        $tanggal = date('d-m-Y');
        $nama_file = $tanggal.'_muzakki_uang.xlsx';
        return Excel::download(new muzakkiUangExport, $nama_file);
    }
    public function importMuzakkiUang(Request $request) 
    {
        $tanggal = date('d-m-Y');

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = $tanggal.'_'.$file->getClientOriginalName();

		// upload ke folder file_pelanggan di dalam folder public
		$file->move('muzakki_uang',$nama_file);

		// import data
		Excel::import(new muzakkiUangImport, public_path('/muzakki_Uang/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Muzakki Uang Berhasil Diimport!');

		// alihkan halaman kembali
        return back();
    }

}

