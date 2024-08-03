<aside class="main-sidebar {{ (!Auth::user()->is_admin) ? 'bg-success sidebar-light-white' : 'sidebar-dark-primary' }} elevation-4" style="{{ (!Auth::user()->is_admin) ? 'background-color: #34eb74 !important;' : '' }}">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/lte/dist/img/logosirmiz.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text {{ (!Auth::user()->is_admin) ? 'text-dark font-weight-dark' : 'font-weight-light' }}">Pendaftaran Guru <br>MTS Sirnamiskin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if (Auth::user()->is_admin)
          <div class="image">
            <img src="{{asset('/lte/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
            
        @endif
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          {{-- sidebar admin --}}
          @if(Auth::user()->is_admin)
              
          <li class="nav-item {{ request()->is('dashboard') ? 'menu-open' : ''}}">
            <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

          <li class="nav-item {{ request()->is('datapendaftar*') || request()->is('dokumenpendaftar*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Data Calon Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/datapendaftar" class="nav-link {{ request()->is('datapendaftar*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pelamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dokumenpendaftar" class="nav-link {{ request()->is('dokumenpendaftar*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokumen Pelamar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->is('kriteria*') || request()->is('alternatif*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Opsi Kriteria Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kriteria" class="nav-link {{ request()->is('kriteria*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bobot Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/alternatif" class="nav-link {{ request()->is('alternatif*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Alternatif</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->is('penilaian*') || request()->is('ranking*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                SAW
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penilaian" class="nav-link {{ request()->is('penilaian*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perhitungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ranking" class="nav-link {{ request()->is('ranking*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ranking</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item {{ request()->is('pengumuman*') ? 'menu-open' : ''}}">
            <a href="/pengumuman" class="nav-link {{ request()->is('pengumuman*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Pengumuman Hasil
              </p>
            </a>
            
          </li>
          @endif  

          @if(!Auth::user()->is_admin)
          {{-- user biasa --}}
          <li class="nav-item {{ request()->is('dashboarduser') ? 'menu-open' : ''}}">
            <a href="/dashboarduser" class="nav-link {{ request()->is('dashboarduser') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

          <li class="nav-item {{ request()->is('formdatapendaftar*') || request()->is('dokumenpendaftaruser*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Data Calon Guru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('formdatapendaftar.index') }}" class="nav-link {{ request()->is('formdatapendaftar*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Data Pelamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dokumenpendaftaruser.index') }}" class="nav-link {{ request()->is('dokumenpendaftaruser*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokumen Pelamar</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item {{ request()->is('kriteriauser*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Manajemen Seleksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kriteriauser.index') }}" class="nav-link {{ request()->is('kriteriauser*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Kriteria</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item {{ request()->is('pengumumanuser') ? 'menu-open' : ''}}">
            <a href="{{ route('pengumumanuser') }}" class="nav-link {{ request()->is('pengumumanuser') ? 'active' : ''}}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Pengumuman Hasil
              </p>
            </a>
            
          </li>

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>