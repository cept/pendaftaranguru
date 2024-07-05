<x-layout>
    <x-slot:title>{{ $title = 'Form Kriteria'; }}</x-slot:title>
    
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Form Kriteria</h3>
        </div>
          <div class="card-body">
            <form action="{{ isset($alternatif) ? route('kriteriauser.update', $alternatif->id) : route('kriteriauser.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($alternatif))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="pendidikan" class="font-weight-bold">Pendidikan Terakhir</label>
                            <select class="form-control" id="pendidikan" name="pendidikan" class="@error('pendidikan') is-invalid @enderror">
                            <option value="" disabled {{ old('pendidikan', $alternatif->pendidikan ?? '') == '' ? 'selected' : '' }}>Pilih Pendidikan Terakhir</option>
                            <option value="0" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '0' ? 'selected' : '' }}>SMA/SMK</option>
                            <option value="0.25" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '0.25' ? 'selected' : '' }}>D3</option>
                            <option value="0.75" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '0.75' ? 'selected' : '' }}>D4/S1</option>
                            <option value="1" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '1' ? 'selected' : '' }}>S2/S3</option>
                            </select>
                        
                            @error('pendidikan')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>    
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="ipk" class="font-weight-bold">IPK</label>
                            <select class="form-control" id="ipk" name="ipk" class="@error('ipk') is-invalid @enderror">
                            <option value="" disabled {{ old('ipk', $alternatif->ipk ?? '') == '' ? 'selected' : '' }}>Pilih IPK</option>
                            <option value="0" {{ old('ipk', $alternatif->ipk ?? '') == '0' ? 'selected' : '' }}>< 2.00</option>
                            <option value="0.25" {{ old('ipk', $alternatif->ipk ?? '') == '0.25' ? 'selected' : '' }}>> 2.00</option>
                            <option value="0.75" {{ old('ipk', $alternatif->ipk ?? '') == '0.75' ? 'selected' : '' }}>> 3.00</option>
                            <option value="1" {{ old('ipk', $alternatif->ipk ?? '') == '1' ? 'selected' : '' }}>> 3.50</option>
                            </select>
                        
                            @error('ipk')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="usia" class="font-weight-bold">Usia</label>
                            <select class="form-control" id="usia" name="usia" class="@error('usia') is-invalid @enderror">
                            <option value="" disabled {{ old('usia', $alternatif->usia ?? '') == '' ? 'selected' : '' }}>Pilih Usia</option>
                            <option value="1" {{ old('usia', $alternatif->usia ?? '') == '1' ? 'selected' : '' }}>< 30 tahun</option>
                            <option value="0.75" {{ old('usia', $alternatif->usia ?? '') == '0.75' ? 'selected' : '' }}>30-34 tahun</option>
                            <option value="0.25" {{ old('usia', $alternatif->usia ?? '') == '0.25' ? 'selected' : '' }}>35-40 tahun</option>
                            <option value="0" {{ old('usia', $alternatif->usia ?? '') == '0' ? 'selected' : '' }}>> 40 tahun</option>
                            </select>
                        
                            @error('usia')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="pengalaman_kerja" class="font-weight-bold">Pengalaman Kerja</label>
                            <select class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" class="@error('pengalaman_kerja') is-invalid @enderror">
                            <option value="" disabled {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '' ? 'selected' : '' }}>Pilih Pengalaman Kerja</option>
                            <option value="0" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '0' ? 'selected' : '' }}>< 5 bulan</option>
                            <option value="0.25" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '0.25' ? 'selected' : '' }}>5 - 11 bulan</option>
                            <option value="0.75" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '0.75' ? 'selected' : '' }}>1 - 2 tahun</option>
                            <option value="1" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '1' ? 'selected' : '' }}>> 2 tahun</option>
                            </select>
                        
                            @error('pengalaman_kerja')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($alternatif) ? 'Perbarui' : 'Tambah' }}</button>
            </form>
          </div>
      </div>
    </x-layout>