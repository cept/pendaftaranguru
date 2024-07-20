<x-layout>
  <x-slot:title>{{ $title = 'Penilaian Calon Guru'; }}</x-slot:title>


<div class="card">
  <!-- /.card-header -->
  <div class="card-body">

    <div class="col-md-10 mb-4">
      <h4 class="mb-1">Data Ternormalisasi</h4>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID Pendaftar</th>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($normalisasis as $normalisasi)
          <tr>
            <td>{{ $normalisasi['id_pendaftar'] }}</td>
            <td>{{ $normalisasi['alternatif']->pendaftar->nama }}</td>
            <td>{{ $normalisasi['ipk'] }}</td>
            <td>{{ $normalisasi['pengalaman_kerja'] }}</td>
            <td>{{ $normalisasi['pendidikan'] }}</td>
            <td>{{ $normalisasi['usia'] }}</td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
      
    </div>

    <div class="col-md-10 mb-4">
      <h4 class="mb-0">Perhitungan</h4>
      <p class="mb-2">(nilai ternormalisasi / bobot)</p>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID Pendaftar</th>
          <th>Nama</th>
          <th>C1</th>
          <th>C2</th>
          <th>C3</th>
          <th>C4</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($totalDatas as $totalData)
          <tr>
            <td>{{ $totalData['id_pendaftar'] }}</td>
            <td>{{ $totalData['alternatif']->pendaftar->nama }}</td>
            <td>{{ $totalData['ipk'] }}</td>
            <td>{{ $totalData['pengalaman_kerja'] }}</td>
            <td>{{ $totalData['pendidikan'] }}</td>
            <td>{{ $totalData['usia'] }}</td>
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