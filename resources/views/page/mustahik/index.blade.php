{{-- Mengambil template dari master --}}
@extends('layout.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Mustahik Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Mustahik Zakat')

{{-- isi content  --}}
@section('content')

    {{-- source code modals --}}
    @include('page._modals')   


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

<div class="row">    
    <div class="col-md-3 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Input Data Mustahik</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body"> 
                <form action="{{ route('mustahik.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <b>Masukkan file excel terlebih dahulu</b>
                    <input type="file" name="file" class="form-control" required='required'>
                    <br>
                    <button class="btn btn-success btn-sm">Import Data Excel Mustahik</button>
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
    <div class="col-md-9 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Tambah data Mustahik</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Golongan</th>
                                    <th>Penjelasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Fakir</td>
                                    <td>Orang yang tidak memiliki harta</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Miskin</td>
                                    <td>Orang yang penghasilannya tidak mencukupi</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Gharim </td>
                                    <td>Orang yang memiliki banyak hutang</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Riqab</td>
                                    <td>Hamba sahaya atau budak</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Golongan</th>
                                    <th>Penjelasan</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                                <tr>
                                    <td>5.</td>
                                    <td>Fisabilillah</td>
                                    <td>Pejuang di jalan Allah</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Mualaf</td>
                                    <td>Orang yang baru masuk Islam</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Ibnu Sabil</td>
                                    <td>Musyafir dan para pelajar perantauan</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Amil zakat</td>
                                    <td>Penerima dan pengelola dana zakat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button href="{{ route('mustahik.create') }}" type="submit" class="btn btn-primary btn-sm modal-show" title="Tambah Mustahik" >Tambah Mustahik</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </div>
</div>


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar <b>Mustahik</b></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Golongan</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>  
            <tbody>
            </tbody>          
        </table>
    </div>
    <!-- /.box-body -->
    {{-- <div class="box-footer">
      Footer
    </div> --}}
    <!-- /.box-footer-->
</div>
<!-- /.box -->

@endsection

{{-- isi javascript --}}
@push('script')
<script>    
    $(document).ready(function(){
        pTable=$('#datatable').DataTable({
            language: {            
                url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json'            
            },        
            responsive: true,
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: "{{ route('mustahik.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'golongan', name: 'golongan'},
                {data: 'alamat', name: 'alamat'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],

            order: [[2, 'asc']],
            rowGroup: {
                dataSrc: 'golongan'
            },

            columnDefs: [
                { targets: [0,], "width": "5%",
                    className: 'dt-center' 
                },
                { targets: [1,2,3,4],  
                    className: 'dt-head-center' 
                },
                { targets: 5, "width": "10%", 
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