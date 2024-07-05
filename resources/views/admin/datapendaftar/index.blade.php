<x-layout>

  <x-slot:title>{{ $title = 'Data Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
      <a href="{{ route('datapendaftar.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID Pendaftar</th>
          <th>Nama Lengkap</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Agama</th>
          <th>Jenis Kelamin</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dataPendaftars as $pendaftar)
          <tr>
            <td>{{ $pendaftar->id }}</td>
            <td>{{ $pendaftar->nama }}</td>
            <td>{{ $pendaftar->tempat_lahir }}</td>
            <td>{{ $pendaftar->tgl_lahir }}</td>
            <td>{{ $pendaftar->agama }}</td>
            <td>{{ $pendaftar->jenis_kelamin }}</td>
            <td class="text-center">
              <form onsubmit="return confirm('Apakah anda yakin ?');" action="{{ route('datapendaftar.destroy', $pendaftar->id) }}" method="post">
                <a href="{{ route('datapendaftar.show', $pendaftar->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                <a href="{{ route('datapendaftar.edit', $pendaftar->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
              </form>
            </td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
      {{-- {{ $dataPendaftars->links() }} --}}
    </div>
    <!-- /.card-body -->
  </div>


</x-layout>