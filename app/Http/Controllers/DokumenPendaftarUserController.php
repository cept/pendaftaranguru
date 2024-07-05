<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use App\Models\DokumenPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenPendaftarUserController extends Controller
{
    //
    public function index()
    {
        
        $dokpendaftar = DokumenPendaftar::where('id_pendaftar', Auth::id())->first();
        
        return view('user.dokumenpendaftar.index', compact('dokpendaftar'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'mimes' => ':attribute harus berupa file bertipe: :values',
        ];

        $request->validate([
            'ijazah' => 'required|mimes:pdf,docx|max:5048',
            'cv' => 'required|mimes:pdf,docx|max:5048',
        ], $messages);

        $data = $request->all();
        $data['id_pendaftar'] = Auth::id();

        $cv = $request->file('cv');
        $cv->storeAs('public/cv', $cv->hashName());
        $data['cv'] = $cv->hashName();
        
        $ijazah = $request->file('ijazah');
        $ijazah->storeAs('public/ijazah', $ijazah->hashName());
        $data['ijazah'] = $ijazah->hashName();

        DokumenPendaftar::create($data);

        return redirect()->route('dokumenpendaftaruser.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = DokumenPendaftar::findOrFail($id);

        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'mimes' => ':attribute harus berupa file bertipe: :values',
        ];

        $request->validate([
            'ijazah' => 'nullable|mimes:jpeg,jpg,png,pdf,docx|max:5048',
            'cv' => 'nullable|mimes:jpeg,jpg,png,pdf,docx|max:5048',
        ], $messages);

        $data = $request->all();

        if ($request->hasFile('cv')) {
            if ($pendaftar->cv) {
                Storage::delete('public/cv/'.$pendaftar->cv);
            }
            
            $cv = $request->file('cv');
            $cv->storeAs('public/cv', $cv->hashName());
            
            
            $data['cv'] = $cv->hashName();
        }
        
        if ($request->hasFile('ijazah')) {
            if ($pendaftar->ijazah) {
                Storage::delete('public/ijazah/'.$pendaftar->ijazah);
            }

            $ijazah = $request->file('ijazah');
            $ijazah->storeAs('public/ijazah', $ijazah->hashName());
            
            
            $data['ijazah'] = $ijazah->hashName();
        }

        $pendaftar->update($data);

        return redirect()->route('dokumenpendaftaruser.index')->with('success', 'Data berhasil diperbarui');
    }
}
