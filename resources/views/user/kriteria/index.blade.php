<x-layout>
    <x-slot:title>{{ $title = 'Form Kriteria'; }}</x-slot:title>
    
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Form Kriteria</h3>
        </div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
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
                            <option value="1" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '1' ? 'selected' : '' }}>SMA/SMK</option>
                            <option value="2" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '2' ? 'selected' : '' }}>D3</option>
                            <option value="3" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '3' ? 'selected' : '' }}>D4/S1</option>
                            <option value="4" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '4' ? 'selected' : '' }}>S2</option>
                            <option value="5" {{ old('pendidikan', $alternatif->pendidikan ?? '') == '5' ? 'selected' : '' }}>S3</option>
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
                            <option value="1" {{ old('ipk', $alternatif->ipk ?? '') == '1' ? 'selected' : '' }}>< 2.00</option>
                            <option value="2" {{ old('ipk', $alternatif->ipk ?? '') == '2' ? 'selected' : '' }}>> 2.00 - 2.50</option>
                            <option value="3" {{ old('ipk', $alternatif->ipk ?? '') == '3' ? 'selected' : '' }}>> 2.50 - 3.00</option>
                            <option value="4" {{ old('ipk', $alternatif->ipk ?? '') == '4' ? 'selected' : '' }}>> 3.00 - 3.50</option>
                            <option value="5" {{ old('ipk', $alternatif->ipk ?? '') == '5' ? 'selected' : '' }}>> 3.50 - 4.00</option>
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
                            <label for="pengalaman_kerja" class="font-weight-bold">Pengalaman Kerja</label>
                            <select class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" class="@error('pengalaman_kerja') is-invalid @enderror">
                            <option value="" disabled {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '' ? 'selected' : '' }}>Pilih Pengalaman Kerja</option>
                            <option value="1" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '1' ? 'selected' : '' }}>< 6 bulan</option>
                            <option value="2" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '2' ? 'selected' : '' }}>> 6 bulan - 1 tahun</option>
                            <option value="3" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '3' ? 'selected' : '' }}>> 1 tahun - 2 tahun</option>
                            <option value="4" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '4' ? 'selected' : '' }}>> 2 tahun - 3 tahun</option>
                            <option value="5" {{ old('pengalaman_kerja', $alternatif->pengalaman_kerja ?? '') == '5' ? 'selected' : '' }}>> 3 tahun</option>
                            </select>
                        
                            @error('pengalaman_kerja')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="usia" class="font-weight-bold">Usia</label>
                            <select class="form-control" id="usia" name="usia" class="@error('usia') is-invalid @enderror">
                            <option value="" disabled {{ old('usia', $alternatif->usia ?? '') == '' ? 'selected' : '' }}>Pilih Usia</option>
                            <option value="1" {{ old('usia', $alternatif->usia ?? '') == '1' ? 'selected' : '' }}>< 25 tahun</option>
                            <option value="2" {{ old('usia', $alternatif->usia ?? '') == '2' ? 'selected' : '' }}>> 25-30 tahun</option>
                            <option value="3" {{ old('usia', $alternatif->usia ?? '') == '3' ? 'selected' : '' }}>> 30-35 tahun</option>
                            <option value="4" {{ old('usia', $alternatif->usia ?? '') == '4' ? 'selected' : '' }}>> 35-40 tahun</option>
                            <option value="5" {{ old('usia', $alternatif->usia ?? '') == '5' ? 'selected' : '' }}>> 40 tahun</option>
                            </select>
                        
                            @error('usia')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($alternatif) ? 'Perbarui' : 'Simpan' }}</button>
            </form>
          </div>
      </div>
    </x-layout>