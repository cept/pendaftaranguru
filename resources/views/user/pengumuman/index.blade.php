<x-layout>
  <x-slot:title>{{ $title = 'Pengumuman'; }}</x-slot:title>

    <div class="container-fluid">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            @if ($pengumuman)
              <p>{{ $pengumuman->deskripsi }}</p>  
            @else
             <p>Belum ada informasi.</p>
                
            @endif
        </div>

    </div>

</x-layout>