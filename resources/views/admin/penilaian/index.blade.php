<x-layout>
  <x-slot:title>{{ $title = 'Penilaian Calon Guru'; }}</x-slot:title>


<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <div class="col-md-10 mb-4">
      <h4>Data Alternatif</h4>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Pendidikan Terakhir</th>
          <th>IPK</th>
          <th>Usia</th>
          <th>Pengalaman Kerja</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($alternatifs as $alternatif)
          <tr>
            <td>{{ $alternatif->id_pendaftar }}</td>
            <td>{{ $alternatif->pendaftar->nama }}</td>
            <td>{{ $alternatif->pendidikan }}</td>
            <td>{{ $alternatif->ipk }}</td>
            <td>{{ $alternatif->usia }}</td>
            <td>{{ $alternatif->pengalaman_kerja }}</td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
    
    </div>

    <div class="col-md-10 mb-4">
      <h4 class="mb-0">Data Normalisasi</h4>
      <p class="mb-2">Benefit: (nilai alternatif / nilai maksimal alternatif), Cost: (nilai minimal alternatif / nilai alternatif)</p>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Pendidikan Terakhir</th>
          <th>IPK</th>
          <th>Usia</th>
          <th>Pengalaman Kerja</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($normalisasis as $normalisasi)
          <tr>
            <td>{{ $normalisasi['id_pendaftar'] }}</td>
            <td>{{ $normalisasi['alternatif']->pendaftar->nama }}</td>
            <td>{{ $normalisasi['pendidikan'] }}</td>
            <td>{{ $normalisasi['ipk'] }}</td>
            <td>{{ $normalisasi['usia'] }}</td>
            <td>{{ $normalisasi['pengalaman_kerja'] }}</td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
      
    </div>

    <div class="col-md-10 mb-4">
      <h4 class="mb-0">Total Data</h4>
      <p class="mb-2">(nilai normalisasi / bobot)</p>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Pendidikan Terakhir</th>
          <th>IPK</th>
          <th>Usia</th>
          <th>Pengalaman Kerja</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($totalDatas as $totalData)
          <tr>
            <td>{{ $totalData['id_pendaftar'] }}</td>
            <td>{{ $totalData['alternatif']->pendaftar->nama }}</td>
            <td>{{ $totalData['pendidikan'] }}</td>
            <td>{{ $totalData['ipk'] }}</td>
            <td>{{ $totalData['usia'] }}</td>
            <td>{{ $totalData['pengalaman_kerja'] }}</td>
            <td>{{ $totalData['total'] }}</td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
      
    </div>


  </div>
  <!-- /.card-body -->
</div>
</x-layout>