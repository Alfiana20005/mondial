<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-users"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Karang Taruna MONDIAL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/dashboard2') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bendahara" aria-expanded="true" aria-controls="bendahara">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Bendahara</span>
        </a>
        <div id="bendahara" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi:</h6>
            
            <!--a class="collapse-item" href="<?= base_url() ?>Kas">Kas</a-->
            <a class="collapse-item" href="<?= base_url() ?>Pemasukan">Pemasukan</a>
            <a class="collapse-item" href="<?= base_url() ?>Pengeluaran">Pengeluaran</a>
            <!-- <a class="collapse-item" href="<?= base_url() ?>Laporan_keuangan">Laporan Keuangan</a> -->
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#petugas" aria-expanded="true" aria-controls="petugas">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Petugas</span>
        </a>
        <div id="petugas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Tampilan:</h6>
            <!-- <a class="collapse-item" href="<?= base_url() ?>Jenis_kegiatan">Jenis Kegiatan</a> -->
            <a class="collapse-item" href="<?= base_url() ?>Kegiatan2">Kegiatan</a>
            <a class="collapse-item" href="<?= base_url() ?>Pengumuman">Pengumuman</a>
            
          </div>
        </div>
      </li>

      

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url() ?>Jadwal">
            <i class="fas fa-fw fa-calendar-alt"></i> <!-- Ikon Kalender -->
        <span>Jadwal</span>
        </a>
        
      </li>

      <!--?php } ?-->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true" aria-controls="pengaturan">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan</span>
        </a>
        <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Pengaturan:</h6>
            <a class="collapse-item" href="<?= base_url('/user') ?>">User</a>
            <a class="collapse-item" href="<?= base_url('Lupa_password') ?>">Lupa Password</a>
            <a class="collapse-item" href="<?= base_url('Pengaduan') ?>">Pengaduan</a>
          </div>
        </div>
      </li>
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>