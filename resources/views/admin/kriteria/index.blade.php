<x-layout>
  <x-slot:title>{{ $title = 'Kriteria Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
      @if ($kriteria)
      <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary">EDIT</a>
          
      @else
      <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Data</a>
          
      @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kode</th>
          <th>Kriteria</th>
          <th>Bobot</th>
          <th>Type</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td>C1</td>
            <td>IPK</td>
            <td>{{ ($kriteria) ? $kriteria->ipk.'%' : '' }}</td>
            <td>Benefit</td>
          </tr>
          <tr>
            <td>C2</td>
            <td>Pengalaman Kerja</td>
            <td>{{ ($kriteria) ? $kriteria->pengalaman_kerja.'%' : '' }}</td>
            <td>Benefit</td>
          </tr>
          <tr>
            <td>C3</td>
            <td>Pendidikan Terakhir</td>
            <td>{{ ($kriteria) ? $kriteria->pendidikan.'%' : '' }}</td>
            <td>Benefit</td>
          </tr>
          <tr>
            <td>C4</td>
            <td>Usia</td>
            <td>{{ ($kriteria) ? $kriteria->usia.'%' : '' }}</td>
            <td>Cost</td>
          </tr>
          
        
        </tbody>
        
      </table>
      {{-- {{ $dataPendaftars->links() }} --}}
    </div>
    <!-- /.card-body -->
  </div>
</x-layout>