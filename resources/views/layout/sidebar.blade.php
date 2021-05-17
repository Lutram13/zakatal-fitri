<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        {{-- --------------MENU UTAMA-------------- --}}
        <li class="header">TAMBAH DATA</li>
        
        {{-- Muzakki --}}
        <li class="treeview">
          <a href="/pelanggan">
            <i class="fa fa-users"></i> <span>Muzakki (Pemberi)</span>
            <span class="pull-right-container">
              <i class="pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href={{route('muzakki.index')}}><i class="fa fa-circle-o text-aqua"></i>Data Muzakki</a></li>
          </ul>
        </li>        
        
        {{-- Mustahik --}}
        <li class="treeview">
          <a href="/pelanggan">
            <i class="fa fa-users"></i> <span>Mustahik (Penerima)</span>
            <span class="pull-right-container">
              <i class="pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href={{route('mustahik.index')}}><i class="fa fa-circle-o text-aqua"></i>Data Mustahik</a></li>
            {{-- <li><a href={{route('mustahik.index')}}><i class="fa fa-circle-o text-aqua"></i>Excel Mustahik</a></li> --}}
          </ul>          
        </li>        
        
        <li><a href={{route('beliberas.index')}}><i class="fa fa-dollar"></i><span>Beli Beras</span></a></li>



        {{-- --------------ANALISIS PELANGGAN-------------- --}}
        <li class="header">PENGHITUNGAN</li>
        
        <li><a href={{route('penghitungan.index')}}><i class="fa fa-sheqel"></i><span>Pembagian Zakat</span></a></li>

        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>