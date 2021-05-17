{!! Form::model($model, [
    'route' => $model->exists ? ['mustahik.update', $model->id] : 'mustahik.store', 
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="nama">Nama Mustahik</label>
        {!! Form::text('nama', Null, ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Masukkan Nama']) !!}                   
    </div>
    <div class="form-group">
        <label for="golongan">Golongan Mustahik</label>
        {!! Form::select('golongan', [
            'Fakir' => 'Fakir', 
            'Miskin' => 'Miskin', 
            'Gharim' => 'Gharim', 
            'Riqab' => 'Riqab', 
            'Fisabilillah' => 'Fisabilillah', 
            'Mualaf' => 'Mualaf', 
            'Ibnu_Sabil' => 'Ibnu Sabil', 
            'Amil_Zakat' => 'Amil Zakat', 
            'Lain_Lain' => 'Lain-lain'], 
            null, ['class' => 'form-control', 'id' => 'golongan', 'placeholder' => 'Pilih Golongan'])!!}
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Mustahik</label>
        {!! Form::text('alamat', Null, ['class' => 'form-control', 'id' => 'alamat', 'placeholder' => 'Masukkan Alamat']) !!}
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        {!! Form::textarea('keterangan', Null, ['class' => 'form-control', 'id' => 'keterangan', 'rows' => '3']) !!}
    </div>        
{!! Form::close() !!}    