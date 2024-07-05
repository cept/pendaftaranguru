<x-layout>
  <x-slot:title>{{ $title = 'Data Alternatif Calon Guru'; }}</x-slot:title>


<div class="card">
  <div class="card-header">
    {{-- <h3 class="card-title">DataTable with default features</h3> --}}
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Data</a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID Pendaftar</th>
        <th>Nama</th>
        <th>Pendidikan Terakhir</th>
        <th>IPK</th>
        <th>Pengalaman Kerja</th>
        <th>Usia</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($alternatifs as $alternatif)
        <tr>
          <td>{{ $alternatif->id_pendaftar }}</td>
          <td>{{ $alternatif->pendaftar->nama }}</td>
          <td>{{ $alternatif->pendidikan }}</td>
          <td>{{ $alternatif->ipk }}</td>
          <td>{{ $alternatif->pengalaman_kerja }}</td>
          <td>{{ $alternatif->usia }}</td>
          <td class="text-center">
            <form onsubmit="return confirm('Apakah anda yakin ?');" action="{{ route('alternatif.destroy', $alternatif->id) }}" method="post">
              <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-sm btn-primary">EDIT</a>

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