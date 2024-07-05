<x-layout>
    <x-slot:title>{{ $title = 'Pengumuman Calon Guru'; }}</x-slot:title>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Pengumuman Calon Guru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="id_pendaftar">Id User</label>
                        <input list="pendaftarList" id="id_pendaftar" name="id_pendaftar" class="form-control @error('id_pendaftar') is-invalid @enderror" value="{{ old('id_pendaftar', $pengumuman->id_pendaftar) }}" readonly>
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
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $pengumuman->deskripsi }}</textarea>
                    
                        @error('deskripsi')
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