<x-layout>
  <x-slot:title>{{ $title = 'Dokumen Calon Guru'; }}</x-slot:title>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Dokumen Calon Guru</h3>
    </div>
    <div class="card-body">
        <form action="{{ isset($dokpendaftar) ? route('dokumenpendaftaruser.update', $dokpendaftar->id) : route('dokumenpendaftaruser.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($dokpendaftar))
              @method('PUT')
            @endif

            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label for="cv">Curriculum Vitae (CV)</label>
                    <input type="file" name="cv" class="form-control-file" id="cv">
              
                      @error('cv')
                          <div class="text-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror

                      @if(isset($dokpendaftar) && $dokpendaftar->cv)
                        <div>
                            <a href="{{ Storage::url('public/cv/' . $dokpendaftar->cv) }}" target="_blank">{{$dokpendaftar->cv}}</a>
                        </div>
                      @endif
                </div>
                <div class="form-group mb-3">
                    <label for="ijazah">Ijazah</label>
                    <input type="file" name="ijazah" class="form-control-file" id="ijazah">
              
                      @error('ijazah')
                          <div class="text-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror

                      @if(isset($dokpendaftar) && $dokpendaftar->ijazah)
                        <div>
                            <a href="{{ Storage::url('public/ijazah/' . $dokpendaftar->ijazah) }}" target="_blank">{{$dokpendaftar->ijazah}}</a>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($dokpendaftar) ? 'Perbarui' : 'Tambah' }}</button>
            </div>

        </form>
    </div>
  </div>
</x-layout>