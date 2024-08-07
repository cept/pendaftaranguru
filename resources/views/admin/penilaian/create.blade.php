<x-layout>
    <x-slot:title>{{ $title = 'Penilaian Calon Guru'; }}</x-slot:title>


  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Penilaian Calon Guru</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('penilaian.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="id_pendaftar">Id User</label>
                    <input list="pendaftarList" id="id_pendaftar" name="id_pendaftar" class="form-control @error('id_pendaftar') is-invalid @enderror" value="{{ old('id_pendaftar') }}">
                    <datalist id="pendaftarList">
                        <option value="" disabled>Pilih Id User</option>
                        @foreach($data_pendaftars as $pendaftar)
                            <option value="{{ $pendaftar->id }}">{{ $pendaftar->nama }}</option>
                        @endforeach
                    </datalist>
                    @error('id_pendaftar')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pendidikan" class="font-weight-bold">Pendidikan Terakhir</label>
                    <select class="form-control" id="pendidikan" name="pendidikan" class="@error('pendidikan') is-invalid @enderror">
                    <option value="" disabled {{ old('pendidikan') == '' ? 'selected' : '' }}>Pilih Pendidikan Terakhir</option>
                    <option value="0" {{ old('pendidikan') == '0' ? 'selected' : '' }}>SMA/SMK</option>
                    <option value="0.25" {{ old('pendidikan') == '0.25' ? 'selected' : '' }}>D3</option>
                    <option value="0.75" {{ old('pendidikan') == '0.75' ? 'selected' : '' }}>D4/S1</option>
                    <option value="1" {{ old('pendidikan') == '1' ? 'selected' : '' }}>S2/S3</option>
                    </select>
                
                    @error('pendidikan')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="ipk" class="font-weight-bold">IPK</label>
                    <select class="form-control" id="ipk" name="ipk" class="@error('ipk') is-invalid @enderror">
                    <option value="" disabled {{ old('ipk') == '' ? 'selected' : '' }}>Pilih IPK</option>
                    <option value="0" {{ old('ipk') == '0' ? 'selected' : '' }}>< 2.00</option>
                    <option value="0.25" {{ old('ipk') == '0.25' ? 'selected' : '' }}>> 2.00</option>
                    <option value="0.75" {{ old('ipk') == '0.75' ? 'selected' : '' }}>> 3.00</option>
                    <option value="1" {{ old('ipk') == '1' ? 'selected' : '' }}>> 3.50</option>
                    </select>
                
                    @error('ipk')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="usia" class="font-weight-bold">Usia</label>
                    <select class="form-control" id="usia" name="usia" class="@error('usia') is-invalid @enderror">
                    <option value="" disabled {{ old('usia') == '' ? 'selected' : '' }}>Pilih Usia</option>
                    <option value="1" {{ old('usia') == '1' ? 'selected' : '' }}>< 30 tahun</option>
                    <option value="0.75" {{ old('usia') == '0.75' ? 'selected' : '' }}>30-34 tahun</option>
                    <option value="0.25" {{ old('usia') == '0.25' ? 'selected' : '' }}>35-40 tahun</option>
                    <option value="0" {{ old('usia') == '0' ? 'selected' : '' }}>> 40 tahun</option>
                    </select>
                
                    @error('usia')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pengalaman_kerja" class="font-weight-bold">Pengalaman Kerja</label>
                    <select class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" class="@error('pengalaman_kerja') is-invalid @enderror">
                    <option value="" disabled {{ old('pengalaman_kerja') == '' ? 'selected' : '' }}>Pilih Pengalaman Kerja</option>
                    <option value="0" {{ old('pengalaman_kerja') == '0' ? 'selected' : '' }}>< 5 bulan</option>
                    <option value="0.25" {{ old('pengalaman_kerja') == '0.25' ? 'selected' : '' }}>5 - 11 bulan</option>
                    <option value="0.75" {{ old('pengalaman_kerja') == '0.75' ? 'selected' : '' }}>1 - 2 tahun</option>
                    <option value="1" {{ old('pengalaman_kerja') == '1' ? 'selected' : '' }}>> 2 tahun</option>
                    </select>
                
                    @error('pengalaman_kerja')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
  </div>
</x-layout>