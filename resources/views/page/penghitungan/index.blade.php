{{-- Mengambil template dari master --}}
@extends('layout.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Penghitungan Zakat')

{{-- Memberi nama judul header content --}}
@section('header', 'Penghitungan Zakat')

{{-- isi content  --}}
@section('content')


<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

        <div class="info-box-content">
            <span class="info-box-text"><b>Zakat Beras</b></span>
            <span class="info-box-text">Tersisa Beras <b id='sisa_Beras'>0</b> Kg dari Jumlah Total <b id='jum'>{{number_format($tot_beras, 1, ',', '.')}} </b>Kg</span>

          <div class="progress">
            <div class="progress-bar" id="progres_Beras" style="width: 100%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

        <div class="info-box-content">
        <span class="info-box-text"><b>Zakat Uang</b></span>
        <span class="info-box-text">Tersisa Uang Rp <b id='sisa_Uang'>0</b> dari Jumlah Total Rp <b id='jum'>{{number_format($tot_uang, 0, ',', '.')}} </b></span>    

          <div class="progress">
            <div class="progress-bar" id="progres_Uang" style="width: 100%"></div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
  <!-- /.row -->

<!-- Default box -->
<div class="box collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Riwayat <b>Beli Beras</b></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <b>Diterima dari muzakki</b>
        <li>Total Beras = {{number_format($jumlahBeras, 1, ',', '.')}} Kg</li>
        <li>Total Uang  = Rp {{number_format($jumlahUang, 0, ',', '.')}}</li>
        <b>Total Beli Beras</b>
        <li>Jumlah = {{number_format($jumlah_beliberas, 1, ',', '.')}} Kg</li>
        <li>Harga  = Rp {{number_format($harga_beliberas, 0, ',', '.', )}}</li>
        <b>Total Terhimpun</b>
        <li>Total Beras + Jumlah = {{number_format($tot_beras, 1, ',', '.')}} Kg</li>
        <li>Total Uang - Harga   = Rp {{number_format($tot_uang, 0, ',', '.', )}}</li>
    </div>
    <!-- /.box-body -->
    {{-- <div class="box-footer">
      Footer
    </div> --}}
    <!-- /.box-footer-->
</div>
<!-- /.box -->

<!-- Default box -->
<div class="box collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Penghitungan Kasar</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        {{-- BERAS --}}
        <h4 class=""><b>Beras</b></h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Golongan</th>
                    <th>Jumlah Beras perkelompok<br>Total Beras : Jum. Golongan</th>
                    <th>Jumlah Orang</th>
                    <th>Jumlah Beras perorang<br>Beras Kelompok : Jum. Orang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info_mustahik as $info)
                    <tr>
                        <td>{{$info['nama']}}</td>
                        <td>{{number_format($tot_beras, 1, ',', '.')}} Kg 
                            : {{$list}} kelompok
                            = {{number_format($BerasKelompok, 1, ',', '.')}} Kg </td>
                        <td>{{$info['jumlah']}}</td>
                        <td>{{number_format($BerasKelompok, 1, ',', '.')}} Kg 
                            : {{$info['jumlah']}} orang
                            = {{number_format($info['beras'], 1, ',', '.')}} Kg </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- UANG --}}
        <h4 class=""><b>Uang</b></h4>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Golongan</th>
                    <th>Jumlah Uang perkelompok<br>Total Uang : Jum. Golongan</th>
                    <th>Jumlah Orang</th>
                    <th>Jumlah Uang perorang<br>Uang Kelompok : Jum. Orang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info_mustahik as $info)
                    <tr>
                        <td>{{$info['nama']}}</td>
                        <td>Rp {{number_format($tot_uang, 0, ',', '.')}}  
                            : {{$list}} kelompok
                            = Rp {{number_format($UangKelompok, 0, ',', '.')}}  </td>
                        <td>{{$info['jumlah']}}</td>
                        <td>Rp {{number_format($UangKelompok, 0, ',', '.')}}  
                            : {{$info['jumlah']}} orang
                            = Rp {{number_format($info['uang'], 0, ',', '.')}}  </td>
                    </tr>
                @endforeach
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


<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Penghitungan</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">    
        <form action="{{route('penghitungan.update')}}" method="post">
            {{ csrf_field() }}
            
            <!-- Default box -->
            @foreach ($info_mustahik as $mustahik)   
            <div class="card collapsed-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <b>{{$mustahik['nama']}}</b>
                            <br><i>Sejumlah {{$mustahik['jumlah']}} Orang</i>
                        </div>                    
                        <div class="col-md-10">
                            <table class="table table-sm">
                                <tr>
                                    <td style="width:25%">Jumlah <b>Beras</b> Perorang </td>
                                    <td style="width:25%">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="beras_{{$mustahik['id']}}" id="beras_{{$mustahik['nama']}}" placeholder="0" onkeyup = cariBeras()>
                                            <span class="input-group-addon">Kg</span>
                                        </div>
                                    </td>
                                    <td style="width:5%">X</td>
                                    <td><b id="orang_{{$mustahik['nama']}}">{{$mustahik['jumlah']}}</b> orang</td>
                                    <td style="width:5%"> = </td>
                                    <td style="width:20%"><b id="hasilBeras_{{$mustahik['nama']}}">0</b> Kg</td>
                                </tr>
                                <tr>
                                    <td>Jumlah <b>Uang</b> Perorang </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" name="uang_{{$mustahik['id']}}" id="uang_{{$mustahik['nama']}}" placeholder="0" onkeyup = cariUang()>
                                        </div>
                                    </td>
                                    <td>X</td>
                                    <td><b>{{$mustahik['jumlah']}}</b> orang</td>
                                    <td> = </td>
                                    <td>Rp <b id="hasilUang_{{$mustahik['nama']}}">0</b></td>
                                </tr>
                            </table>
                        </div>                
                    </div>
                    {{-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div> --}}
                </div>
                {{-- <div class="card-body">
                    Start creating your amazing application!
                </div> --}}
                <!-- /.card-body -->
                {{-- <div class="card-footer">
                    Footer
                </div> --}}
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        @endforeach
        <!-- Default box -->
        {{-- <div class="card">
            <div class="card-body">                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm" >Simpan Perhitungan</button>
                </div>
            </div>
        </div> --}}
        <!-- /.card -->
        
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm" >Simpan Pengitungan</button>
            </div>
            <!-- /.box-footer-->
        </form>
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
    var BerasTerkumpul= "<?php echo $tot_beras ?>";
    document.getElementById("sisa_Beras").innerHTML = new Intl.NumberFormat('de-DE').format(BerasTerkumpul);
    
    var UangTerkumpul= "<?php echo $tot_uang ?>";
    document.getElementById("sisa_Uang").innerHTML = new Intl.NumberFormat('de-DE').format(UangTerkumpul);

    function cariBeras() {
        // var jumBeras = $jumlahBeras;
        var BerasTerkumpul= "<?php echo $tot_beras ?>";

        // var jumlahOrangBeras= 3;


        var totalSeluruhBeras = 0;
        var sisaBeras; 

        var golongan = <?php echo json_encode($golongan_NNull)?>;
        // var golongan = <?php echo $golongan?>;
        golongan.forEach(myFunction);

        function myFunction(item) {
            var a = {};
            a['beras_'+item] = parseFloat(document.getElementById("beras_"+item).value);
            var d = {};
            d['jumlahOrangBeras'+item] = parseInt(document.getElementById("orang_"+item).innerHTML);
            var progres = document.getElementById("progres_Beras");
            var sisaBerasText = document.getElementById("sisa_Beras");
            var b = {}; 
            b['hasilBeras_'+item] = document.getElementById("hasilBeras_"+item);

            //Menghitung total dan sisa beras
            var c = {}; 
            var sisaBeras; 
            c['totalBeras_'+item] = a['beras_'+item] * d['jumlahOrangBeras'+item];
            if(isNaN(c['totalBeras_'+item])){
                c['totalBeras_'+item]=0;
            }

            //Menuliskan hasil perkalian jumlah beras dengan julah orang pada setiap golongan
            b['hasilBeras_'+item].innerHTML = new Intl.NumberFormat('de-DE').format(c['totalBeras_'+item]);   

            totalSeluruhBeras += c['totalBeras_'+item];   
            
            sisaBeras = BerasTerkumpul - totalSeluruhBeras;

            //Menampilkan hasil total dan sisa beras
            sisaBerasText.innerHTML = new Intl.NumberFormat('de-DE').format(sisaBeras);

            var persen;
            var width = 100;
            persen = (sisaBeras/BerasTerkumpul)*100;
            if (persen < 0 ) {
                progres.style.width = "0%";
                sisaBerasText.style.color = "red";
            } else{
                progres.style.width = persen + "%";
                sisaBerasText.style.color = "#fff";
            }       
        }
    } 

    function cariUang() {
        var UangTerkumpul= "<?php echo $tot_uang ?>";

        var totalSeluruhUang = 0;
        var sisaUang; 

        var golongan = <?php echo json_encode($golongan_NNull)?>;
        golongan.forEach(myFunction);

        function myFunction(item) {
            var a = {};
            a['uang_'+item] = parseInt(document.getElementById("uang_"+item).value);
            var d = {};
            d['jumlahOrangUang'+item] = parseInt(document.getElementById("orang_"+item).innerHTML);
            var progres = document.getElementById("progres_Uang");
            var sisaUangText = document.getElementById("sisa_Uang");
            var b = {}; 
            b['hasilUang_'+item] = document.getElementById("hasilUang_"+item);

            //Menghitung total dan sisa Uang
            var c = {}; 
            var sisaUang; 
            c['totalUang_'+item] = a['uang_'+item] * d['jumlahOrangUang'+item];
            if(isNaN(c['totalUang_'+item])){
                c['totalUang_'+item]=0;
            }

            //Menuliskan hasil perkalian jumlah Uang dengan julah orang pada setiap golongan
            b['hasilUang_'+item].innerHTML = new Intl.NumberFormat('de-DE').format(c['totalUang_'+item]);   

            totalSeluruhUang += c['totalUang_'+item];   
            
            sisaUang = UangTerkumpul - totalSeluruhUang;
            
            //Menampilkan hasil total dan sisa Uang
            sisaUangText.innerHTML = new Intl.NumberFormat('de-DE').format(sisaUang);                           

            var persen;
            var width = 100;
            persen = (sisaUang/UangTerkumpul)*100;
            if (persen < 0 ) {
                progres.style.width = "0%";
                sisaUangText.style.color = "red";
            } else{
                progres.style.width = persen + "%";
                sisaUangText.style.color = "#fff";
            }       
        }       
    } 

</script>
@endpush