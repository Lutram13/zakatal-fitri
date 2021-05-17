{!! Form::model($model, [
    'route' => $model->exists ? ['beliberas.update', $model->id] : 'beliberas.store', 
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="jumlah">Jumlah Beras</label>                    
        <div class="input-group">
            {!! Form::text('jumlah', Null, ['class' => 'form-control', 'id' => 'jumlah', 'placeholder' => 'Masukkan Jumlah Beras']) !!}
            
                <span class="input-group-addon">Kg</span>
            
        </div>                    
    </div>    
    <div class="form-group">
        <label for="harga">Harga</label>                    
        <div class="input-group">
            
                <span class="input-group-addon">Rp</span>
            
            {!! Form::text('harga', Null, ['class' => 'form-control', 'id' => 'harga', 'placeholder' => 'Masukkan Jumlah Uang']) !!}
            
                <span class="input-group-addon">.00</span>
            
        </div>                    
    </div>
            
{!! Form::close() !!}    