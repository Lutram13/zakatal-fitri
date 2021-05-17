<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beliberas;
use DataTables;

class beliberasController extends Controller
{
    public function index()
    {
        return view('page.beliberas.index');
    }

    public function create()
    {
        $model = new beliberas();
        return view('page.beliberas.form', compact('model'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'nama' => 'required|string|max:255',
            'jumlah' => 'required',
            'harga' => 'required',
        ]);
    
        $model = beliberas::create([
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);
        
        return $model;
    }

    public function edit($id)
    {        
        $model = beliberas::findOrFail($id);
        return view('page.beliberas.form', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jumlah' => 'required',
            'harga' => 'required',
        ]);

        
        $model = beliberas::findOrFail($id);

        $model->update($request->all());
        return view('page.beliberas.index', compact('model'));
    }

    public function destroy($id)
    {
        $model = beliberas::findOrFail($id);
        $model->delete();
    }

    public function dataTableBeliberas()
    {
        // return 'Ini table';
        $model = beliberas::query();
        return DataTables::of($model)
            ->addColumn('aksi', function ($model) {
                return view('page.beliberas._action', [
                    'model' => $model,
                    // 'url_show' => route('beliberas.show', $model->id),
                    'url_edit' => route('beliberas.edit', $model->id),
                    'url_destroy' => route('beliberas.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
