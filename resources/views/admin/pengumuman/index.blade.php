<x-layout>
  <x-slot:title>{{ $title = 'Pengumuman Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nama Lengkap</th>
          <th>Deskripsi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($pengumumans as $pengumuman)
          <tr>
            <td>{{ $pengumuman->id_pendaftar }}</td>
            <td>{{ $pengumuman->pendaftar->nama }}</td>
            <td>{{ $pengumuman->deskripsi }}</td>
            <td class="text-center">
              <form onsubmit="return confirm('Apakah anda yakin ?');" action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="post">
                <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
              </form>
            </td>
          </tr>
              
          @endforeach
        
        </tbody>
        
      </table>
    </div>
  </div>

</x-layout>