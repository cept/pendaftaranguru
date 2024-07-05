<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    //

    public function index()
    {
        $pengumumans = Pengumuman::all();

        return view('admin.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        $data_pendaftars = DataPendaftar::all();

        return view('admin.pengumuman.create' , compact('data_pendaftars'));
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
            'id_pendaftar' => 'required|unique:pengumumans',
            'deskripsi' => 'required',
        ], $messages);

        $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

        if (!$pendaftarExists) {
            return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
        }

        Pengumuman::create($validated);

        return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function edit(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $data_pendaftars = DataPendaftar::all();

        return view('admin.pengumuman.edit', compact('pengumuman', 'data_pendaftars'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'unique' => ':attribute sudah ditambahkan',
        ];

        $validated = $request->validate([
            'deskripsi' => 'required',
        ], $messages);

        $pengumuman = Pengumuman::findOrFail($id);

        $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

        if (!$pendaftarExists) {
            return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
        }

        $pengumuman->update($validated);

        return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with(['success' => 'Data berhasil dihapus!']);
    }

    public function user()
    {
        $pengumuman = Pengumuman::where('id_pendaftar', Auth::id())->first();

        return view('user.pengumuman.index', compact('pengumuman'));
    }
}
