{{-- Mengambil template dari master --}}
@extends('layout.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Beranda')

{{-- Memberi nama judul header content --}}
@section('header', 'Beranda')

{{-- isi content  --}}
@section('content')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-inbox"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Beras dari Muzakki</span>
                <span class="info-box-number">{{$jumlahBeras}} Kg</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Uang dari Muzakki</span>
                <span class="info-box-number">Rp {{number_format($jumlahUang, 0, ',', '.')}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Beli Beras</span>
                <span class="info-box-number">{{$jumlah_beliberas}} Kg</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Beras</span>
                <span class="info-box-number">{{$total_beras}} Kg</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Visualisasi Data Muzakki (Pemberi Zakat)</h3>
        
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">                
                <figure class="highcharts-figure">
                    <div id="containerMuzakki"></div>
                    <p class="highcharts-description">
                    {{-- A basic column chart compares rainfall values between four cities.
                    Tokyo has the overall highest amount of rainfall, followed by New York.
                    The chart is making use of the axis crosshair feature, to highlight
                    months as they are hovered over. --}}
                    </p>
                </figure>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">Muzzaki Beras</h5>
                            <span class="description-text">{{$jumlahMuzzakiBeras}} Orang</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 col-xs-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">Muzzaki Uang</h5>
                            <span class="description-text">{{$jumlahMuzzakiUang}} Orang</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Visualisasi Data Mustahik (Penerima Zakat)</h3>
        
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
            </div>
            <div class="box-body">
                <figure class="highcharts-figure">
                    <div id="containerMustahik"></div>
                    <p class="highcharts-description">
                    {{-- This chart shows how packed bubble charts can be grouped by series,
                    creating a hierarchy. --}}
                    </p>
                </figure>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    @foreach ($info_mustahik as $mustahik)
                        <div class="col-sm-4">
                            <div class="description-block border-right">
                                <h5 class="description-header">{{$mustahik['nama']}}</h5>
                                <span class="description-text">{{$mustahik['jumlah']}} Orang</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->                         
                    @endforeach                   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </div>
</div>

<section class="invoice height: 70%">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header  text-center">
          Data Perolehan dan Penyaluran Zakat Fitrah<BR>
          Masjid Jami' Baitusy Syukur Tahun 1442 H/2021 M
          {{-- <small class="pull-right">Date: 2/10/2014</small> --}}
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col ">
            <h3 class=" text-center"><strong>الْحَمْدُ لِلّٰهِ رَبِّ الْعَا لَمِيْنَ حَمْدًا شَا كِرِيْنَ</strong></h3>
            <p>
                Telah terkumpul dari warga Masjid Jami' Baitusy Syukur Zakat Fitrah berupa <strong>beras</strong> dan titipan
                <strong>uang</strong> yang kemudian digunakan untuk membeli beras sebagai zakat. Pengumpulan zakat fitrah dilaksanakan panitia  mulai dari hari <strong>Minggu, 9 Mei 2021</strong> hingga hari <strong>Selasa, 11 Mei 2021</strong>. Sedangkan Penyaluran zakat fitrah dilaksanakan panitia pada hari <strong>Rabu, 12 Mei 2021</strong>. Adapun rincian besaran perolehan dan penyaluran zakat sebagai berikut: 
            </p><br>
            <h5 class=""><strong>A. PEROLEHAN ZAKAT</strong></h5>
            <p>
                1. Total Beras dari muzakki = {{number_format($jumlahBeras, 2, ',', '.')}} Kg<br>
                2. Total Uang dari muzakki =  Rp {{number_format($jumlahUang, 0, ',', '.')}}<br>
                3. Pembelian Beras = {{number_format($jumlah_beliberas, 2, ',', '.')}} Kg Seharga Rp {{number_format($harga_beliberas, 0, ',', '.', )}}<br>
                <strong>Total Beras Terkumpul =  {{number_format($total_beras, 2, ',', '.')}} Kg </strong><br>
                <strong>Sisa Uang =  Rp {{number_format($total_uang, 0, ',', '.')}} </strong>
            </p><br>       
            
            <h5 class=""><strong>B. PENYALURAN ZAKAT</strong></h5>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Golongan</th>
                        <th class="text-center">Jumlah Penerima</th>
                        <th class="text-center">Jumlah Beras diterima</th>
                        <th class="text-center">Total Beras</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalSeluruh = 0;?>
                    @foreach ($info_mustahik as $info)
                        <tr>
                            <td>{{$info['nama']}}</td>
                            <td class="text-center">{{$info['jumlah']}} orang</td>
                            <td class="text-center">{{number_format($info['beras'], 2, ',', '.')}} Kg</td>
                            <?php $total=$info['jumlah']*$info['beras'];?>
                            <td class="text-center">{{number_format($total, 2, ',', '.')}} Kg</td>
                            <?php $totalSeluruh = $totalSeluruh + $total ?>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-center" colspan="3"><strong>Total Seluruh Beras Yang disalurkan</strong></td>
                        <td class="text-center"><strong>{{number_format($totalSeluruh, 2, ',', '.')}} Kg</strong></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3"><strong>Sisa beras =</strong> {{number_format($total_beras, 2, ',', '.')}} Kg - {{number_format($totalSeluruh, 2, ',', '.')}} Kg</td>
                        <?php $sisa = $total_beras - $totalSeluruh?>
                        <td class="text-center"><strong>{{number_format($sisa, 2, ',', '.')}} Kg</strong></td>
                    </tr>
                </tbody>
            </table>
            <h5 class=""><strong>Keterangan Tambahan:</strong></h5>
            <p>
                1. Golongan <strong>Lain-lain</strong> merupakan tambahan sejumlah beras untuk beberapa orang dalam golongan <strong>Fisabillilah</strong> yang memiliki kontribusi lebih dalam proses Syiar Islam di lingkungan Masjid Jami' Bitusy Syukur.<br>
                2. Sisa Beras Sejumlah <strong>{{number_format($sisa, 2, ',', '.')}} Kg</strong> disalurkan ke tiga pondok pesantren yaitu :<br>
                <i>a. Yayasan fajar rukun kharismatik Panti asuhan arri'ayah, Pabelan<br>
                   b. Yayasan pondok pesantren salaf AS-SYAFI'IYAH, Krajan, Jetis, Bandungan<br>
                   c. Pondok pesantren As salafy putra-putri "Nurul Ulum", Sembungan utara<br></i>
                3. Sisa Uang yang ada dikelola Amil Zakat sebagai dana penunjang kebutuhan kegiatan penerimaan Zakat Firah dan Hari Raya Idul Fitri 1442 H/2021 M <br>                
            </p><br>

            <h5 class=""><strong>C.PENUTUP</strong></h5>
            <p>
                Panitia Penerimaan Zakat Firah Masjid Jami' Baitusy Syukur tahun 1442 H/2021 M telah berusaha secara maksimal dan hati-hati dalam proses pendataan, penerimaan, pengelolaan dan penyaluran Zakat Fitrah sesuai dengan Ajaran Islam setrta arahan para kyai, ulama dan sesepuh. Walaupun begitu. dengan segenap ketulusan dan kerendahan hati, panitia meminta maaf jika dalam prosesnya masih terdapat kesalahan atau ada hal yang tidak sesuai.<br>

                Panitia mengucapkan Selamat Idul Fitri 1442 H/2021. Mohon Maaf Lahir dan Batin.<br>               
                             
            </p><br>

        <!-- /.col -->
    </div>
    <!-- /.row -->  
</section>

@endsection

@push('script')
<script src="/adminLTE/highcharts/highcharts.js"></script>
<script src="/adminLTE/highcharts/highcharts-more.js"></script>
<script src="/adminLTE/highcharts/modules/exporting.js"></script>
<script src="/adminLTE/highcharts/modules/export-data.js"></script>
<script src="/adminLTE/highcharts/modules/accessibility.js"></script>

<script>
Highcharts.chart('containerMustahik', {
  chart: {
    type: 'packedbubble',
    height: '58%'
  },
  title: {
    text: 'Grafik Bubble : Kelompok Penerima Zakat'
  },
  tooltip: {
    useHTML: true,
    pointFormat: '<b>{point.name}:</b> {point.value}Kg'
  },
  plotOptions: {
    packedbubble: {
      minSize: '20%',
      maxSize: '100%',
      zMin: 0,
      zMax: 1000,
      layoutAlgorithm: {
        gravitationalConstant: 0.05,
        splitSeries: true,
        seriesInteraction: false,
        dragBetweenSeries: true,
        parentNodeLimit: true
      },
      dataLabels: {
        enabled: true,
        format: '{point.name}',
        filter: {
          property: 'y',
          operator: '>',
          value: 250
        },
        style: {
          color: 'black',
          textOutline: 'none',
          fontWeight: 'normal'
        }
      }
    }
  },  
  series: <?php echo json_encode($data); ?>
});

Highcharts.chart('containerMuzakki', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Grafik Perbandingan Muzakki Beras - Muzakki Uang'
  },
  subtitle: {
    text: 'Perbandingan dikelompokkan berdasarkan RT'
  },
  xAxis: {
    categories: [
      'Rt 03',
      'Rt 04',
      'Rt 05',
      'Rt 06',
      'Rt 07',
      'Rt 08',
      'Rt 09',
      'Rt 10',
      'Lain-lain'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Orang/Jiwa'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y} Orang</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: <?php echo json_encode($muzakki); ?>
});
    
</script>
@endpush


