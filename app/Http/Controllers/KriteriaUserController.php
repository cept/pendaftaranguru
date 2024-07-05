<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
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
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $request->validate([
            'pendidikan' => 'required',
            'ipk' => 'required',
            'pengalaman_kerja' => 'required',
            'usia' => 'required|numeric',
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
            'pendidikan' => 'required',
            'ipk' => 'required',
            'pengalaman_kerja' => 'required',
            'usia' => 'required|numeric',
        ], $messages);

        $data = $request->all();

        $pendaftar->update($data);

        return redirect()->route('kriteriauser.index')->with('success', 'Data berhasil diperbarui');
    }
}