<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('public/assets/img/avatar5.png')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>  {{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <!-- <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form> -->
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <?php $role = Auth::user()->role_id; ?>
    @if($role == 2)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li> 
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
     
      @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp
      <li class="treeview {{$badge}}">
        <a href="#">
         <i class="fa fa-id-badge"></i>
          <span><b> MDPJ</b></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview {{Request::is('badge') || Request::is('daftarsendiri')  ||Request::is('mdpj/badge') ?'active':''}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>Daftar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('daftarsendiri')?'active':''}}"><a href="{{url('daftarsendiri')}}"><i class="fa fa-circle-o"></i>Daftar Untuk Diri Sendiri</a></li>
              <li class="{{Request::is('mdpj/badge')?'active':''}}"><a href="{{url('mdpj/badge')}}"><i class="fa fa-circle-o"></i>Daftar Untuk Orang Lain</a></li>
            </ul>
          </li>
          <li class="treeview {{Request::is('badge') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':''}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>Approve</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('mdpj/approve_gembala_cabang')?'active':''}}"><a href="{{url('mdpj/approve_gembala_cabang')}}"><i class="fa fa-circle-o"></i> Gembala Cabang</a></li>
              <li class="{{Request::is('mdpj/approve_admin_rayon')?'active':''}}"><a href="{{url('mdpj/approve_admin_rayon')}}"><i class="fa fa-circle-o"></i>Admin Rayon</a></li>
              <li class="{{Request::is('mdpj/approve_gembala_rayon')?'active':''}}"><a href="{{url('mdpj/approve_gembala_rayon')}}"><i class="fa fa-circle-o"></i>Gembala Rayon</a></li>
              <li class="{{Request::is('mdpj/approve_pusat')?'active':''}}"><a href="{{url('mdpj/approve_pusat')}}"><i class="fa fa-circle-o"></i>Pusat</a></li>
            </ul>
          </li>
          <li class="{{Request::is('pertemuan/absensi') ?'active':''}}"><a href="{{url('pertemuan/absensi')}}"><i class="fa fa-circle-o"></i> Absensi</a></li>
          <li class="{{Request::is('pertemuan') ?'active':''}}"><a href="#"><i class="fa fa-circle-o"></i> Laporan</a></li>
          
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge')?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
         <i class="fa fa-id-badge"></i>
          <span><b> Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
      @php
        $parent_institusi = Request::is('divisi') || Request::is('rayon') || Request::is('subrayon') || Request::is('cabang')?'active':'';
      @endphp
      <li class="treeview {{$parent_institusi}}">
        <a href="#">
          <i class="fa fa-institution"></i>
          <span>Institusi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{Request::is('divisi')?'active':''}}"><a href="{{url('divisi')}}"><i class="fa fa-circle-o"></i> Institusi Non Struktural</a></li>
          <li class="{{Request::is('rayon') || Request::is('subrayon') || Request::is('cabang')?'active':''}}"><a href="{{url('rayon')}}"><i class="fa fa-circle-o"></i> Institusi Struktural</a></li>
         
        </ul>
      </li>
       @php
          $parent_modul = Request::is('kegiatan') || Request::is('kom') || Request::is('modul/pengerja')|| Request::is('pertemuan')  || Request::is('cool')  || Request::is('modul/ibadahraya') || Request::is('pengerja') ||  Request::is('cool') || Request::is('materi') || Request::is('modul/pengkhotbah/tamukhusus') || Request::is('modul/pengkhotbah/tamu') || Request::is('kelaskom') || Request::is('guru') || Request::is('murid') || Request::is('materi') || Request::is('bp2nmateri') || Request::is('bp2npeserta') || Request::is('bp2nguru') || Request::is('bp2ncalonguru') || Request::is('bp2nkehadiran') || Request::is('bp2nkonseling') || Request::is('bp2n') || Request::is('modul/pelayanjemaat/baptisan') || Request::is('modul/pelayanjemaat/baptisan/caper') || Request::is('dokumenbaptisan') || Request::is('modul/pelayanjemaat/penyerahananak') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenanak') || Request::is('modul/pelayanjemaat/pernikahan') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenpernikahan') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('modul/pelayanjemaat/pernikahan/caper') || Request::is('modul/pelayanjemaat/peneguhan') || Request::is('modul/pelayanjemaat/peneguhan/caper') || Request::is('dokumenpeneguhan') || Request::is('modul/pelayanjemaat/pernikahan/pendaftaran') || Request::is('modul/pelayanjemaat/pernikahan/tambahakta') || Request::is('modul/pelayanjemaat/baptisan/pendaftaran') || Request::is('modul/pelayanjemaat/baptisan/tambahakta')
          || Request::is('modul/pelayanjemaat/penyerahananak/pendaftaran') || Request::is('modul/pelayanjemaat/penyerahananak/tambahakta') || Request::is('modul/pelayanjemaat/peneguhan/pendaftaran') || Request::is('modul/pelayanjemaat/peneguhan/tambahakta')?'active':'';
        @endphp
      <li class="treeview {{$parent_modul}}">
        <a href="#">
          <i class="fa fa-share-square-o"></i>
          <span>Modul</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="{{Request::is('kegiatan')?'active':''}}"><a href="{{url('kegiatan')}}"><i class="fa fa-circle-o"></i> Kegiatan</a></li>
          <li class="treeview {{Request::is('modul/pengerja') || Request::is('pertemuan') ?'active':''}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>Pengerja</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('modul/pengerja')?'active':''}}"><a href="{{url('modul/pengerja')}}">
                <i class="fa fa-circle-o"></i>
                <span>Pengerja</span>
                </a>
              </li>
              <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}">
                <i class="fa fa-circle-o"></i>
                <span>Pertemuan</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="{{Request::is('modul/ibadahraya')?'active':''}}"><a href="{{url('modul/ibadahraya')}}">
            <i class="fa fa-circle-o"></i>
            <span>Ibadah Raya</span>
            </a>
          </li>
          @php
          $pengkhotbah = Request::is('tamukhusus') || Request::is('tamu')?'active':'';
          @endphp
          <li class="treeview {{Request::is('modul/pengkhotbah/tamukhusus') || Request::is('modul/pengkhotbah/tamu')?'active':''}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>Pengkhotbah</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('modul/pengkhotbah/tamukhusus')?'active':''}}"><a href="{{url('modul/pengkhotbah/tamukhusus')}}"><i class="fa fa-circle-o"></i> Tamu Khusus</a></li>
              <li class="{{Request::is('modul/pengkhotbah/tamu')?'active':''}}"><a href="{{url('modul/pengkhotbah/tamu')}}"><i class="fa fa-circle-o"></i> Pengkhotbah Tamu</a></li>
            </ul>
          </li>
          <li class="treeview {{Request::is('kelaskom') || Request::is('murid') || Request::is('guru') || Request::is('materi') ? 'active' :'' }}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>KOM</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('kelaskom')?'active':''}}"><a href="{{url('kelaskom')}}">
                <i class="fa fa-circle-o"></i>
                <span>Kelas KOM Murid</span>
                </a>
              </li>
              <li class="{{Request::is('murid')?'active':''}}"><a href="{{url('murid')}}">
                <i class="fa fa-circle-o"></i>
                <span>Murid</span>
                </a>
              </li>
              <li class="{{Request::is('guru')?'active':''}}"><a href="{{url('guru')}}">
                <i class="fa fa-circle-o"></i>
                <span>Guru</span>
                </a>
              </li>
              <li class="{{Request::is('materi')?'active':''}}"><a href="{{url('materi')}}">
                <i class="fa fa-circle-o"></i>
                <span>Materi</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="{{Request::is('cool')?'active':''}}"><a href="{{url('cool')}}"><i class="fa fa-circle-o"></i> COOL</a></li>
          @php
          $bpn = Request::is('bp2nmateri') || Request::is('bp2npeserta') || Request::is('bp2nguru') || Request::is('bp2ncalonguru') || Request::is('bp2nkehadiran') || Request::is('bp2nkonseling') || Request::is('bp2n')?'active':'';
          @endphp
          <li class="treeview {{$bpn}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>BP2N</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('bp2nmateri')?'active':''}}"><a href="{{url('bp2nmateri')}}">
                <i class="fa fa-circle-o"></i>
                <span>Materi</span>
                </a>
              </li>
              <li class="{{Request::is('bp2npeserta') || Request::is('bp2nkehadiran') || Request::is('bp2nkonseling')?'active':''}}"><a href="{{url('bp2npeserta')}}">
                <i class="fa fa-circle-o"></i>
                <span>Peserta</span>
                </a>
              </li>
              <li class="{{Request::is('bp2nguru')?'active':''}}"><a href="{{url('bp2nguru')}}">
                <i class="fa fa-circle-o"></i>
                <span>Guru</span>
                </a>
              </li>
              <li class="{{Request::is('bp2ncalonguru')?'active':''}}"><a href="{{url('bp2ncalonguru')}}">
                <i class="fa fa-circle-o"></i>
                <span>Calon Guru</span>
                </a>
              </li>
            </ul>
          </li>
           @php
          $pelayanan = Request::is('modul/pelayanjemaat/baptisan') || Request::is('modul/pelayanjemaat/baptisan')?'active':'';
          @endphp
          <li class="treeview {{Request::is('modul/pelayanjemaat/baptisan') || Request::is('modul/pelayanjemaat/baptisan/pendaftaran') || Request::is('modul/pelayanjemaat/baptisan/caper') || Request::is('dokumenbaptisan') || Request::is('modul/pelayanjemaat/penyerahananak') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenanak') || Request::is('modul/pelayanjemaat/pernikahan') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenpernikahan') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenanak') || Request::is('modul/pelayanjemaat/peneguhan') || Request::is('modul/pelayanjemaat/peneguhan/caper') || Request::is('dokumenpeneguhan') || Request::is('modul/pelayanjemaat/pernikahan/pendaftaran') || Request::is('modul/pelayanjemaat/pernikahan/tambahakta') || Request::is('modul/pelayanjemaat/baptisan/tambahakta') || Request::is('modul/pelayanjemaat/penyerahananak/pendaftaran') || Request::is('modul/pelayanjemaat/penyerahananak/tambahakta') || Request::is('modul/pelayanjemaat/peneguhan/pendaftaran') || Request::is('modul/pelayanjemaat/peneguhan/tambahakta') ?'active':''}}">
            <a href="#">
              <i class="fa fa-folder-o"></i>
              <span>Pelayanan Jemaat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{Request::is('modul/pelayanjemaat/baptisan') || Request::is('modul/pelayanjemaat/baptisan/caper') || Request::is('dokumenbaptisan') || Request::is('modul/pelayanjemaat/baptisan/pendaftaran') || Request::is('modul/pelayanjemaat/baptisan/tambahakta') ?'active':''}}">
                <a href="{{url('modul/pelayanjemaat/baptisan')}}">
                  <i class="fa fa-circle-o"></i>
                  <span>Baptisan</span>
                </a>  
              </li>
              <li class="{{ Request::is('modul/pelayanjemaat/penyerahananak') || Request::is('modul/pelayanjemaat/penyerahananak/caper') || Request::is('dokumenanak') || Request::is('modul/pelayanjemaat/penyerahananak/pendaftaran') || Request::is('modul/pelayanjemaat/penyerahananak/tambahakta') ?'active':''}}">
                <a href="{{url('modul/pelayanjemaat/penyerahananak')}}">
                  <i class="fa fa-circle-o"></i>
                  <span>Penyerahan Anak</span>
                </a>  
              </li>
             <li class="{{Request::is('modul/pelayanjemaat/pernikahan') || Request::is('dokumenpernikahan') || Request::is('modul/pelayanjemaat/pernikahan/caper')  || Request::is('modul/pelayanjemaat/pernikahan/pendaftaran') || Request::is('modul/pelayanjemaat/pernikahan/tambahakta')? 'active' : ''}}">
                <a href="{{url('modul/pelayanjemaat/pernikahan')}}">
                  <i class="fa fa-circle-o"></i>
                  <span>Pernikahan</span>
                </a>  
              </li>
              <li class="{{Request::is('modul/pelayanjemaat/peneguhan') || Request::is('modul/pelayanjemaat/peneguhan/caper') || Request::is('dokumenpeneguhan') || Request::is('modul/pelayanjemaat/peneguhan/pendaftaran') || Request::is('modul/pelayanjemaat/peneguhan/tambahakta') ? 'active' : ''}}">
                <a href="{{url('modul/pelayanjemaat/peneguhan')}}">
                  <i class="fa fa-circle-o"></i>
                  <span>Peneguhan</span>
                </a>  
              </li>
              
            </ul>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa  fa-file-text-o"></i>
          <span>Laporan</span>
        </a>
      </li>
        @php
          $parent_master = Request::is('profesi') || Request::is('bidangpekerjaan')  || Request::is('jenispekerjaan') || Request::is('tipecool') || Request::is('jabatan')?'active':'';
        @endphp
      <li class="treeview {{$parent_master}}">
        <a href="#">
          <i class="fa fa-tasks"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('profesi')?'active':''}}"><a href="{{url('profesi')}}"><i class="fa fa-circle-o"></i> Profesi</a></li>
          <li class="{{Request::is('bidangpekerjaan')?'active':''}}"><a href="{{url('bidangpekerjaan')}}"><i class="fa fa-circle-o"></i> Bidang Pekerjaan</a></li>
          <li class="{{Request::is('jenispekerjaan')?'active':''}}"><a href="{{url('jenispekerjaan')}}"><i class="fa fa-circle-o"></i> Jenis Pekerjaan</a></li>
          <li class="{{Request::is('tipecool')?'active':''}}"><a href="{{url('tipecool')}}"><i class="fa fa-circle-o"></i> Tipe Cool</a></li>
          <li class="{{Request::is('jabatan')?'active':''}}"><a href="{{url('jabatan')}}"><i class="fa fa-circle-o"></i> Jabatan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-map"></i>
          <span>Map</span>
        </a>
      </li>
       @php
        $acl = Request::is('acl/url') || Request::is('acl/role') || Request::is('acl/rule') ?'active':'';
       @endphp
      <li class="treeview {{$acl}}">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manajemen Akun</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{Request::is('acl/url')?'active':''}}"><a href="{{url('acl/url')}}"><i class="fa fa-circle-o"></i>Url</a></li>
          <li class="{{Request::is('acl/role')?'active':''}}"><a href="{{url('acl/role')}}"><i class="fa fa-circle-o"></i>Role</a></li>
          <li class="{{Request::is('acl/rule')?'active':''}}"><a href="{{url('acl/rule')}}"><i class="fa fa-circle-o"></i>Rule</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa fa-gears"></i>
          <span>Pengaturan</span>
        </a>
      </li>
    @elseif($role == 3)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
      <li class="{{Request::is('pertemuan') ?'active':''}}">
        <a href="{{url('pertemuan')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>MDPJ</b></span>
        </a>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>

    @elseif($role == 4)
    <?php $us_p = Auth::user();
      $id_jab = \App\Vuser::where('id',$us_p->id)->first();
 
     ?>

      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('pertemuan') ?'active':''}}">
        <a href="{{url('pertemuan')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>MDPJ</b></span>
        </a>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('pengerja') ? 'active':''}}">

       @if($id_jab->id_jabpel != null)
        <a href="{{url('pengerja',$id_jab->id_jabpel)}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
        @else
        <a href="{{url('/daftarsendiri')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
        @endif
      </li>
      @elseif($role == 5)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
      <li class="{{Request::is('pertemuan') ?'active':''}}">
        <a href="{{url('pertemuan')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>MDPJ</b></span>
        </a>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
      
      @elseif($role == 7)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      @php
          $mdpj = Request::is('pertemuan') || Request::is('mdpj/approve_gembala_cabang') ?'active':'';
        @endphp
      <li class="treeview {{$mdpj}}">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>Mdpj</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}"><i class="fa fa-circle-o"></i> Pertemuan MDPJ</a></li>
          <li class="{{Request::is('mdpj/approve_gembala_cabang')?'active':''}}"><a href="{{url('mdpj/approve_gembala_cabang')}}"><i class="fa fa-circle-o"></i> Pelayan Acc</a></li>
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
      @elseif($role == 6)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
      @php
          $mdpj = Request::is('pertemuan') || Request::is('mdpj/badge') ?'active':'';
        @endphp
      <li class="treeview {{$mdpj}}">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>Mdpj</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}"><i class="fa fa-circle-o"></i> Pertemuan MDPJ</a></li>
          <li class="{{Request::is('mdpj/badge')?'active':''}}"><a href="{{url('mdpj/badge')}}"><i class="fa fa-circle-o"></i> Pelayan Acc</a></li>
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
      @elseif($role == 9)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      @php
        $mdpj = Request::is('pertemuan') || Request::is('mdpj/approve_gembala_rayon') ?'active':'';
      @endphp
      <li class="treeview {{$mdpj}}">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>Mdpj</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}"><i class="fa fa-circle-o"></i> Pertemuan MDPJ</a></li>
          <li class="{{Request::is('mdpj/approve_gembala_rayon')?'active':''}}"><a href="{{url('mdpj/approve_gembala_rayon')}}"><i class="fa fa-circle-o"></i> Pelayan Acc</a></li>
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
      @elseif($role == 8)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
      @php
        $mdpj = Request::is('pertemuan') || Request::is('mdpj/approve_admin_rayon') ?'active':'';
      @endphp
      <li class="treeview {{$mdpj}}">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>Mdpj</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}"><i class="fa fa-circle-o"></i> Pertemuan MDPJ</a></li>
          <li class="{{Request::is('mdpj/approve_admin_rayon')?'active':''}}"><a href="{{url('mdpj/approve_admin_rayon')}}"><i class="fa fa-circle-o"></i> Pelayan Acc</a></li>
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
    @elseif($role == 10)
      <li class="{{Request::is('/')?'active':''}}">
        <a href="{{url('/')}}">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a> 
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-history"></i>
          <span>History Aktivitas</span>
        </a>
      </li>
     <!--  @php
       $badge = Request::is('badge') || Request::is('daftarsendiri') || Request::is('mdpj/badge') ||Request::is('pertemuan/absensi') || Request::is('mdpj/approve_gembala_cabang') || Request::is('mdpj/approve_admin_rayon') || Request::is('mdpj/approve_gembala_rayon') || Request::is('mdpj/approve_pusat')?'active':'';
      @endphp -->
      <li class="{{Request::is('generate')?'active':''}}">
        <a href="{{url('/generate')}}">
          <i class="fa fa-user"></i>
          <span>Generate</span>
        </a>
      </li>
      @php
        $mdpj = Request::is('pertemuan') || Request::is('mdpj/approve_pusat') ?'active':'';
      @endphp
      <li class="treeview {{$mdpj}}">
        <a href="#">
          <i class="fa fa-id-badge"></i>
          <span>MDPJ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
          <li class="{{Request::is('pertemuan')?'active':''}}"><a href="{{url('pertemuan')}}"><i class="fa fa-circle-o"></i> Pertemuan MDPJ</a></li>
          <li class="{{Request::is('mdpj/approve_pusat')?'active':''}}"><a href="{{url('mdpj/approve_pusat')}}"><i class="fa fa-circle-o"></i> Pelayan Acc</a></li>
        </ul>
      </li>
      <li class="{{Request::is('mdpj/cetak_badge') ?'active':''}}">
        <a href="{{url('mdpj/cetak_badge')}}">
          <i class="fa fa-id-badge"></i>
          <span cla><b>Badge</b></span>
        </a>
      </li>
      <li class="{{Request::is('personal')?'active':''}}">
        <a href="{{url('personal')}}">
          <i class="fa fa-users"></i> <span>Personal</span>
        </a>
      </li>
    @endif 
  </ul>
</section>

