<x-layout>
    <x-slot:title>{{ $title = 'Data Calon Guru'; }}</x-slot:title>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($pendaftar) ? 'Edit Data Calon Guru' : 'Tambah Data Calon Guru' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($pendaftar) ? route('formdatapendaftar.update', $pendaftar->id) : route('formdatapendaftar.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($pendaftar))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $pendaftar->nama ?? '') }}">
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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $pendaftar->email ?? '') }}">
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
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir ?? '') }}">
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
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $pendaftar->tgl_lahir ?? '') }}">
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
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $pendaftar->alamat ?? '') }}">
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
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $pendaftar->no_hp ?? '') }}">
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
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" disabled {{ old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == '' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                            <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama">
                                <option value="" disabled {{ old('agama', $pendaftar->agama ?? '') == '' ? 'selected' : '' }}>Pilih Agama</option>
                                <option value="islam" {{ old('agama', $pendaftar->agama ?? '') == 'islam' ? 'selected' : '' }}>Islam</option>
                                <option value="kristen" {{ old('agama', $pendaftar->agama ?? '') == 'kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="hindu" {{ old('agama', $pendaftar->agama ?? '') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="budha" {{ old('agama', $pendaftar->agama ?? '') == 'budha' ? 'selected' : '' }}>Budha</option>
                                <option value="khonghucu" {{ old('agama', $pendaftar->agama ?? '') == 'khonghucu' ? 'selected' : '' }}>Khonghucu</option>
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
                            @if(isset($pendaftar) && $pendaftar->foto)
                                <img src="{{ asset('storage/images/' . $pendaftar->foto) }}" alt="Foto Pendaftar" class="img-thumbnail mt-2" width="100">
                            @endif
                            @error('foto')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($pendaftar) ? 'Perbarui' : 'Tambah' }}</button>
            </form>
        </div>
    </div>
</x-layout>
