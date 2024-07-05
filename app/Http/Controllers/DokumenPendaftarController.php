<?php

namespace App\Http\Controllers;

use App\Models\DokumenPendaftar;
use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DokumenPendaftarController extends Controller
{
    //
    public function index(): View
    {
        $dokumenPendaftars = DokumenPendaftar::all();
        
        return view('admin.dokumenpendaftar.index', compact('dokumenPendaftars'));
    }

    public function create() : View
    {
        $data_pendaftars = DataPendaftar::all();

        return view('admin.dokumenpendaftar.create' , compact('data_pendaftars'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'unique' => ':attribute sudah ditambahkan',
        ];

        $validated = $request->validate([
            'id_pendaftar' => 'required|unique:dokumen_pendaftars',
            'ijazah' => 'required|mimes:jpeg,jpg,png,pdf,docx|max:5048',
            'cv' => 'required|mimes:jpeg,jpg,png,pdf,docx|max:5048',
        ], $messages);

        $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

        if (!$pendaftarExists) {
            return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
        }

        $ijazah = $request->file('ijazah');
        $ijazah->storeAs('public/ijazah', $ijazah->hashName());
        $validated['ijazah'] = $ijazah->hashName();
        
        $cv = $request->file('cv');
        $cv->storeAs('public/cv', $cv->hashName());
        $validated['cv'] = $cv->hashName();

        DokumenPendaftar::create($validated);

        return redirect()->route('dokumenpendaftar.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id): View
    {
        $dokumenPendaftar = DokumenPendaftar::findOrFail($id);
        $data_pendaftars = DataPendaftar::all();

        return view('admin.dokumenpendaftar.edit', compact('dokumenPendaftar', 'data_pendaftars'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'unique' => ':attribute sudah ditambahkan',
        ];

        $dokumenPendaftar = DokumenPendaftar::findOrFail($id);

        $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

        if (!$pendaftarExists) {
            return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
        }

        // validasi ijazah
        if ($request->hasFile('ijazah')) {
            $request->validate([
                'ijazah' => 'required|mimes:jpeg,jpg,png,pdf,docx|max:5048',
            ], $messages);

            $ijazah = $request->file('ijazah');
            $ijazah->storeAs('public/ijazah', $ijazah->hashName());

            if ($dokumenPendaftar->ijazah) {
                Storage::delete('public/ijazah/'.$dokumenPendaftar->ijazah);
            }

            $validated['ijazah'] = $ijazah->hashName();
        } else {
            $validated['ijazah'] = $dokumenPendaftar->ijazah;
        }

        // validasi cv
        if ($request->hasFile('cv')) {
            $request->validate([
                'cv' => 'required|mimes:jpeg,jpg,png,pdf,docx|max:5048',
            ], $messages);

            $cv = $request->file('cv');
            $cv->storeAs('public/cv', $cv->hashName());

            if ($dokumenPendaftar->cv) {
                Storage::delete('public/cv/'.$dokumenPendaftar->cv);
            }

            $validated['cv'] = $cv->hashName();
        } else {
            $validated['cv'] = $dokumenPendaftar->cv;
        }

        $dokumenPendaftar->update($validated);

        return redirect()->route('dokumenpendaftar.index')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id)
    {
        $dokumenPendaftar = DokumenPendaftar::findOrFail($id);
        
        Storage::delete('public/ijazah/'.$dokumenPendaftar->ijazah);
        Storage::delete('public/cv/'.$dokumenPendaftar->cv);

        $dokumenPendaftar->delete();

        return redirect()->route('dokumenpendaftar.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
