<x-layout>
    <x-slot:title>{{ $title = 'Kriteria Calon Guru'; }}</x-slot:title>

  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Kriteria Calon Guru</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('kriteria.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
              <div class="form-group mb-3">
                  <label for="pendidikan" class="font-weight-bold d-block">Pendidikan Terakhir</label>
                  <input type="number" class="form-control d-inline-block w-75 @error('pendidikan') is-invalid @enderror" name="pendidikan" value="{{ old('pendidikan') }}" placeholder="30">
                  <span class="form-control d-inline-block text-center" style="width: 40px">%</span>
              
                  @error('pendidikan')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-group mb-3">
                  <label for="ipk" class="font-weight-bold d-block">IPK</label>
                  <input type="number" class="form-control d-inline-block w-75 @error('ipk') is-invalid @enderror" name="ipk" value="{{ old('ipk') }}" placeholder="25">
                  <span class="form-control d-inline-block text-center" style="width: 40px">%</span>
              
                  @error('ipk')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-group mb-3">
                  <label for="pengalaman_kerja" class="font-weight-bold d-block">Pengalaman Kerja</label>
                  <input type="number" class="form-control d-inline-block w-75 @error('pengalaman_kerja') is-invalid @enderror" name="pengalaman_kerja" value="{{ old('pengalaman_kerja') }}" placeholder="30">
                  <span class="form-control d-inline-block text-center" style="width: 40px">%</span>
              
                  @error('pengalaman_kerja')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <div class="form-group mb-3">
                  <label for="usia" class="font-weight-bold d-block">Usia</label>
                  <input type="number" class="form-control d-inline-block w-75 @error('usia') is-invalid @enderror" name="usia" value="{{ old('usia') }}" placeholder="15">
                  <span class="form-control d-inline-block text-center" style="width: 40px">%</span>
              
                  @error('usia')
                      <div class="text-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
  
              <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
  </div>
</x-layout>