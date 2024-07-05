<x-layout>

  <x-slot:title>{{ $title = 'Dokumen Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
      <a href="{{ route('dokumenpendaftar.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID Pendaftar</th>
          <th>Nama Lengkap</th>
          <th>Ijazah</th>
          <th>CV</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dokumenPendaftars as $dokpendaftar)
          <tr>
            <td>{{ $dokpendaftar->id_pendaftar }}</td>
            <td>{{ $dokpendaftar->pendaftar->nama }}</td>
            <td><a href="{{ Storage::url('public/ijazah/' . $dokpendaftar->ijazah) }}" target="_blank">Lihat Ijazah</a></td>
            <td><a href="{{ Storage::url('public/cv/' . $dokpendaftar->cv) }}" target="_blank">Lihat CV</a></td>
            <td class="text-center">
              <form onsubmit="return confirm('Apakah anda yakin ?');" action="{{ route('dokumenpendaftar.destroy', $dokpendaftar->id) }}" method="post">
                <a href="{{ route('dokumenpendaftar.edit', $dokpendaftar->id) }}" class="btn btn-sm btn-primary">EDIT</a>

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