<x-layout>
    <x-slot:title>{{ $title = 'Data Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Data Calon Guru</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('datapendaftar.update', $dataPendaftar->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $dataPendaftar->nama) }}">
                
                    @error('nama')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="email" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $dataPendaftar->email) }}">
                
                    @error('email')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="tempat_lahir" class="font-weight-bold">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $dataPendaftar->tempat_lahir) }}">
                
                    @error('tempat_lahir')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="tgl_lahir" class="font-weight-bold">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $dataPendaftar->tgl_lahir) }}">
                
                    @error('tgl_lahir')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="alamat" class="font-weight-bold">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $dataPendaftar->alamat) }}">
                
                    @error('alamat')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="no_hp" class="font-weight-bold">No HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $dataPendaftar->no_hp) }}">
                
                    @error('no_hp')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror">
                    <option value="" disabled {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $dataPendaftar->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $dataPendaftar->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                  </select>
            
                    @error('jenis_kelamin')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="agama" class="font-weight-bold">Agama</label>
                <select class="form-control" id="agama" name="agama" class="@error('agama') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="islam" {{ old('agama', $dataPendaftar->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ old('agama', $dataPendaftar->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="hindu" {{ old('agama', $dataPendaftar->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="budha" {{ old('agama', $dataPendaftar->agama) == 'budha' ? 'selected' : '' }}>Budha</option>
                    <option value="khonghucu" {{ old('agama', $dataPendaftar->agama) == 'khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                </select>
          
                  @error('agama')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control-file" id="foto">
            
                    @error('foto')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    @if ($dataPendaftar->foto)
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Saat Ini:</label>
                            <img src="{{ asset('storage/images/' . $dataPendaftar->foto) }}" alt="Foto Profil" class="rounded mt-2" width="80px">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>

    </div>

  </div>




           
</x-layout>