<x-layout>
  <x-slot:title>{{ $title = 'Ranking Calon Guru'; }}</x-slot:title>

  <div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Ranking</th>
              <th>ID Pendaftar</th>
              <th>Nama Kandidat</th>
              <th>Jumlah Nilai</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($rankings as $index => $ranking)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $ranking['id_pendaftar'] }}</td>
                <td>{{ $ranking['alternatif']->pendaftar->nama  }}</td>
                <td>{{ $ranking['total'] }}</td>
              </tr>
                  
              @endforeach
            
            </tbody>
            
          </table>
    </div>
  </div>
</x-layout>