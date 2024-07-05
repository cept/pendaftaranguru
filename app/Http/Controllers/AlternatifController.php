<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlternatifController extends Controller
{
    //
    public function index(): View
    {
        $alternatifs = Alternatif::all();

        return view('admin.alternatif.index', compact('alternatifs'));
    }

    public function create(): View
    {
        $data_pendaftars = DataPendaftar::all();
        return view('admin.alternatif.create', compact('data_pendaftars'));
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
            'id_pendaftar' => 'required|unique:alternatifs',
            'pendidikan' => 'required',
            'ipk' => 'required',
            'usia' => 'required',
            'pengalaman_kerja' => 'required',
        ], $messages);

        $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

        if (!$pendaftarExists) {
            return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
        }

        Alternatif::create($validated);

        return redirect()->route('alternatif.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id): View
    {
        $alternatif = Alternatif::findOrFail($id);
        $data_pendaftars = DataPendaftar::all();
        return view('admin.alternatif.edit', compact('alternatif', 'data_pendaftars'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $validated = $request->validate([
            'pendidikan' => 'required',
            'ipk' => 'required',
            'usia' => 'required',
            'pengalaman_kerja' => 'required',
        ], $messages);

        $alternatif = Alternatif::findOrFail($id);

        $alternatif->update($validated);
        return redirect()->route('alternatif.index')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $alternatif->delete();

        return redirect()->route('alternatif.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
