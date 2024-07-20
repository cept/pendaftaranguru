<x-layout>
  <x-slot:title>{{ $title = 'Dashboard'; }}</x-slot:title>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $totalPelamar }}</h3>

              <p>Data Pelamar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="datapendaftar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $dokumenPelamar }}</h3>

              <p>Dokumen Pelamar</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="dokumenpendaftar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $dataAlternatif }}</h3>

              <p>Data Alternatif</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/alternatif" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
          <h1 class="display-4 text-secondary">Selamat Datang Di Dashboard SISPEGU</h1>
          <p class="lead">Sistem Seleksi Penerimaan Guru MTs Sirnamiskin</p>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
</x-layout>