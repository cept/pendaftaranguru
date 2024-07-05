<x-layout>
    <x-slot:title>{{ $title = 'Dokumen Calon Guru'; }}</x-slot:title>


 <div class="card">
   <div class="card-header">
     <h3 class="card-title">Edit Dokumen Calon Guru</h3>
   </div>
   <div class="card-body">
       <form action="{{ route('dokumenpendaftar.update', $dokumenPendaftar->id) }}" method="post" enctype="multipart/form-data">
           @csrf
           @method('put')

           <div class="col-md-3">
             <div class="form-group mb-3">
               <label for="id_pendaftar">Id User</label>
               <input list="pendaftarList" id="id_pendaftar" name="id_pendaftar" class="form-control @error('id_pendaftar') is-invalid @enderror" value="{{ old('id_pendaftar', $dokumenPendaftar->id_pendaftar) }}" readonly>
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
                   <label for="cv">Curriculum Vitae (CV)</label>
                   <input type="file" name="cv" class="form-control-file" id="cv">
             
                     @error('cv')
                         <div class="text-danger mt-2">
                             {{ $message }}
                         </div>
                     @enderror

                    @if ($dokumenPendaftar->cv)
                        <div>
                            <a href="{{ Storage::url('public/cv/' . $dokumenPendaftar->cv) }}" target="_blank">{{$dokumenPendaftar->cv}}</a>
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

                     @if ($dokumenPendaftar->ijazah)
                        <div>
                            <a href="{{ Storage::url('public/ijazah/' . $dokumenPendaftar->ijazah) }}" target="_blank">{{$dokumenPendaftar->ijazah}}</a>
                        </div>
                    @endif
               </div>

               <button type="submit" class="btn btn-primary">Update</button>
           </div>

       </form>
   </div>
 </div>
</x-layout>