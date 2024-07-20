<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KriteriaController extends Controller
{
    //
    public function index(): View
    {
        $kriteria = Kriteria::all()->first();

        return view('admin.kriteria.index', compact('kriteria'));
    }

    public function create(): View
    {

        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $validated = $request->validate([
            'pendidikan' => 'required',
            'ipk' => 'required',
            'pengalaman_kerja' => 'required',
            'usia' => 'required|numeric',
        ], $messages);

        Kriteria::create($validated);

        return redirect()->route('kriteria.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id): View
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', compact('kriteria'));
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
            'pengalaman_kerja' => 'required',
            'usia' => 'required|numeric',
        ], $messages);

        $kriteria = Kriteria::findOrFail($id);

        $kriteria->update($validated);
        return redirect()->route('kriteria.index')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $kriteria->delete();

        return redirect()->route('kriteria.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
