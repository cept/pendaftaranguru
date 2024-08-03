<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\DataPendaftar;
use App\Models\DokumenPendaftar;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KriteriaUserController extends Controller
{
    //
    public function index()
    {
        // Ambil data pendaftar untuk pengguna yang sedang login
        $alternatif = Alternatif::where('id_pendaftar', Auth::id())->first();
        return view('user.kriteria.index', compact('alternatif'));
    }

    public function store(Request $request)
    {
        $pendaftar = DataPendaftar::where('id', Auth::id())->first();
        $dokumen = DokumenPendaftar::where('id_pendaftar', Auth::id())->first();

        if (!$pendaftar || !$dokumen) {
            return redirect()->route('kriteriauser.index')->withErrors('Anda harus mengisi data pendaftar dan dokumen pendaftar terlebih dahulu.');
        }
        
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $request->validate([
            'pendidikan' => 'required|max:20',
            'ipk' => 'required|max:20',
            'pengalaman_kerja' => 'required|max:20',
            'usia' => 'required|numeric|max:20',
        ], $messages);

        $data = $request->all();
        $data['id_pendaftar'] = Auth::id();

        Alternatif::create($data);

        return redirect()->route('kriteriauser.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Alternatif::findOrFail($id);

        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $request->validate([
            'pendidikan' => 'required|max:20',
            'ipk' => 'required|max:20',
            'pengalaman_kerja' => 'required|max:20',
            'usia' => 'required|numeric|max:20',
        ], $messages);

        $data = $request->all();

        $pendaftar->update($data);

        return redirect()->route('kriteriauser.index')->with('success', 'Data berhasil diperbarui');
    }
}
