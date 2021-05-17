<div>
    <strong>Id Muzakki : </strong>
    <i class="text-muted"> {{ $model->id }}</i>
    <table class="table table-condensed">
        <tr>
            <td>Nama Muzakki</td>
            <td> </td>
            <td>{{ $model->nama }}</td>
        </tr>
        <tr>
            <td>Alamat Muzakki</td>
            <td> </td>
            <td>{{ $model->alamat }}</td>
        </tr>
        <tr>
            <td>RT</td>
            <td> </td>
            <td>{{ $model->rt }}</td>
        </tr>
        <tr>
            <td>Jumlah Uang</td>
            <td> </td>
            <td>Rp {{number_format($model->jumlahUang,2,',','.')}}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td> </td>
            <td>{{ $model->keterangan }}</td>
        </tr>
    </table>
</div>