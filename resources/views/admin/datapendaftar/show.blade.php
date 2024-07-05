<x-layout>
    <x-slot:title>{{ $title = 'Data Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Informasi Lengkap Calon Guru</h3>
    </div>

    <div class="card-body">
        <a href="{{route('datapendaftar.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/images/'.$dataPendaftar->foto) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $dataPendaftar->nama }}</h3>
                        <hr/>
                        <table>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->email }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->agama }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>:</td>
                                <td>{{ $dataPendaftar->no_hp }}</td>
                            </tr>

                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>  
</x-layout>