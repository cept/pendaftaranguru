<x-layout>
  <x-slot:title>{{ $title = 'Kriteria Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
      <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th></th>
          <th>Bobot Pendidikan</th>
          <th>Bobot IPK</th>
          <th>Bobot Pengalaman Kerja</th>
          <th>Bobot Usia</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($kriterias as $kriteria)
          <tr>
            <td></td>
            <td>{{ $kriteria->pendidikan }}%</td>
            <td>{{ $kriteria->ipk }}%</td>
            <td>{{ $kriteria->pengalaman_kerja }}%</td>
            <td>{{ $kriteria->usia }}%</td>
            <td class="text-center">
              <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary">EDIT</a>
              
            </td>
          </tr>
          @endforeach
          <tr>
            <td>Type</td>
            <td>Benefit</td>
            <td>Benefit</td>
            <td>Benefit</td>
            <td>Cost</td>
            <td></td>
          </tr>
        
        </tbody>
        
      </table>
      {{-- {{ $dataPendaftars->links() }} --}}
    </div>
    <!-- /.card-body -->
  </div>
</x-layout>