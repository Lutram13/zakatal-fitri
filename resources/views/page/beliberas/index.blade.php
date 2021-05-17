{{-- Mengambil template dari master --}}
@extends('layout.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Beli Beras')

{{-- Memberi nama judul header content --}}
@section('header', 'Beli Beras')

{{-- isi content  --}}
@section('content')

    
    @include('page._modals')   

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Riwayat <b>Beli Beras</h3><br>
      <button href="{{ route('beliberas.create') }}" type="submit" class="btn btn-primary btn-sm modal-show" title="Beli Beras" >Tambah</button>

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
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
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
            ajax: "{{ route('beliberas.tabel') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                // {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'jumlah', name: 'jumlah'},
                {data: 'harga', name: 'harga'},
                {data: 'aksi', name: 'aksi', searchable: false, sortable: false, orderable : false,}
            ],

            columnDefs: [
                { targets: 0, "width": "5%",
                    className: 'dt-center' 
                },
                { targets: 1,  
                    className: 'dt-center' 
                },
                { targets: 2,
                    render: $.fn.dataTable.render.number( '.', ',', 1, '',' Kg' ),
                    className: 'dt-center' 
                },                
                { targets: 3,
                    render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp '),
                    className: 'dt-center' 
                },
                { targets: 4, "width": "10%", 
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