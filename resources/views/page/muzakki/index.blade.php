{{-- Mengambil template dari master --}}
@extends('layout.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Muzakki Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Muzakki Zakat (Pemberi Zakat)')

{{-- isi content  --}}
@section('content')



    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('file') }}</strong>
    </span>
    @endif

    {{-- notifikasi sukses --}}
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $sukses }}</strong>
    </div>
    @endif



    {{-- source code modals --}}
    @include('page._modals')

<div class="row">    
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Input Data Muzakki <b>Beras</b></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body"> 
                <form action="{{ route('muzakki.import.muzakkiBeras') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <b>Masukkan file excel terlebih dahulu</b>
                    <input type="file" name="file" class="form-control" required='required'>
                    <br>
                    <button class="btn btn-success btn-sm">Import Data Excel Muzakki Beras</button>
                </form> 
            </div>
            <!-- /.box-body -->
            {{-- <div class="box-footer">
            Footer
            </div> --}}
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Input Data Muzakki <b>Uang</b></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body"> 
                <form action="{{ route('muzakki.import.muzakkiUang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <b>Masukkan file excel terlebih dahulu</b>
                    <input type="file" name="file" class="form-control" required='required'>
                    <br>
                    <button class="btn btn-success btn-sm">Import Data Excel Muzakki Uang</button>
                </form> 
            </div>
            <!-- /.box-body -->
            {{-- <div class="box-footer">
            Footer
            </div> --}}
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
</div>



<!-- Default box -->
{{-- <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Input Data</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered text-center">
            <tr>
                <td>Zakat Berupa Kilogram <b>Beras</b></td>
                <td>Zakat Berupa Sejumlah <b>Uang</b></td>
            </tr>
            <tr>
                <td><a href="{{ route('muzakki.beras.create') }}" class="btn btn-block btn-primary modal-show" title="Tambah muzakki Beras">Tambah Zakat Beras</a></td>
                <td><a href="{{ route('muzakki.uang.create') }}" class="btn btn-block btn-primary modal-show" title="Tambah muzakki Uang">Tambah Zakat Uang</a></td>
            </tr>
            <tr>
                <td>       
                    <form action="{{ route('muzakki.import.muzakkiBeras') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <b>Masukkan file excel terlebih dahulu</b>
                        <input type="file" name="file" class="form-control" required='required'>
                        <br>
                        <button class="btn btn-success">Import Data Muzakki Ecel</button>
                    </form> </td>
                <td></td>
            </tr>
        </table>          
    </div>
</div> --}}
<!-- /.box -->


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Zakat <b>Beras</b></h3>      
      <button href="{{ route('muzakki.beras.create') }}" type="submit" class="btn btn-primary btn-sm modal-show" title="Tambah muzakki Beras">Tambah Zakat Beras</button>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">        
        <table id="datatableBeras" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>Jumlah Beras</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>  
            <tbody>
            </tbody>          
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <form action="">     
          <a class="btn btn-warning btn-sm" href="{{ route('muzakki.export.muzakkiBeras') }}">Export Data Excel Muzakki Beras</a>
        </form>
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Zakat <b>Uang</b></h3>
      <button href="{{ route('muzakki.uang.create') }}" class="btn btn-primary btn-sm modal-show" title="Tambah muzakki Uang">Tambah Zakat Uang</button>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <table id="datatableUang" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>Jumlah Uang</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>  
            <tbody>
            </tbody>          
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <form action="">     
          <a class="btn btn-warning btn-sm" href="{{ route('muzakki.export.muzakkiUang') }}">Export Data Excel Muzakki Uang</a>
        </form>
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->


@endsection

@push('script')
<script>    
    $(document).ready(function(){
        pTable=$('#datatableBeras').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('muzakki.beras.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'rt', name: 'rt'},
                {data: 'jumlahBeras', name: 'jumlahBeras'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],
            
            order: [[2, 'asc']],
            rowGroup: {
                startRender: function ( rows, group ) {
                    
    
                    return $('<tr/>')
                        .append( '<td colspan="7">RT 0'+group+'</td>' );
                },
                dataSrc: 'rt'
            },
            
            columnDefs: [
                { targets: [0,3], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [4], "width": "5%",
                    render: $.fn.dataTable.render.number( '.', ',', 1, '',' Kg' ),
                    className: 'dt-center' 
                },
                { targets: [5],  
                    className: 'dt-center' 
                },
                { targets: [1,2],  
                    className: 'dt-head-center' 
                },
                { targets: 6, "width": "10%", 
                    className: 'dt-center' 
                }
            ]
        });
        
        //Untuk membuat select row
        $('#datatable tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                pTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    
        $('#button').click( function () {
            pTable.row('.selected').remove().draw( false );
        } );
    
    });
</script>
    
<script>    
    $(document).ready(function(){
        pTable=$('#datatableUang').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('muzakki.uang.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'rt', name: 'rt'},
                {data: 'jumlahUang', name: 'jumlahUang'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],
            
            order: [[2, 'asc']],
            rowGroup: {
                startRender: function ( rows, group ) {
                    
    
                    return $('<tr/>')
                        .append( '<td colspan="7">RT 0'+group+'</td>' );
                },
                dataSrc: 'rt'
            },

            columnDefs: [
                { targets: [0,3], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [4], "width": "15%",
                    render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp '),
                    className: 'dt-center' 
                },
                { targets: [5],  
                    className: 'dt-center' 
                },
                { targets: [1,2],  
                    className: 'dt-head-center' 
                },
                { targets: 6, "width": "10%", 
                    className: 'dt-center' 
                }
            ]
        });
        
        //Untuk membuat select row
        $('#datatable tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                pTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );
    
        $('#button').click( function () {
            pTable.row('.selected').remove().draw( false );
        } );
    
    });
</script>
    
@endpush