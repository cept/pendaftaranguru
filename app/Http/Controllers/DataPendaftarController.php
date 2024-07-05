<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DataPendaftarController extends Controller
{
    //

    public function index(): View
    {
        $dataPendaftars = DataPendaftar::all();
        
        return view('admin.datapendaftar.index', compact('dataPendaftars'));
    }

    public function create() : View
    {
        return view('admin.datapendaftar.create');
    }

    public function createUser() : View
    {
        return view('user.datapendaftar.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $validated = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|min:10|max:15',
            'email' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], $messages);

        $image = $request->file('foto');
        $image->storeAs('public/images', $image->hashName());
        $validated['foto'] = $image->hashName();

        DataPendaftar::create($validated);

        return redirect()->route('datapendaftar.index')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function show(string $id): View
    {
        $dataPendaftar = DataPendaftar::findOrFail($id);

        return view('admin.datapendaftar.show', compact('dataPendaftar'));
    }

    public function edit(string $id): View
    {
        $dataPendaftar = DataPendaftar::findOrFail($id);

        return view('admin.datapendaftar.edit', compact('dataPendaftar'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $validated = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|min:10|max:15',
            'email' => 'required',
        ], $messages);

        $dataPendaftar = DataPendaftar::findOrFail($id);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ], $messages);

            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());

            if ($dataPendaftar->foto) {
                Storage::delete('public/images/'.$dataPendaftar->foto);
            }

            $validated['foto'] = $image->hashName();
        } else {
            $validated['foto'] = $dataPendaftar->foto;
        }

        $dataPendaftar->update($validated);

        return redirect()->route('datapendaftar.index')->with(['success' => 'Data berhasil diubah!']);
    }

    public function destroy($id)
    {
        $dataPendaftar = DataPendaftar::findOrFail($id);
        
        Storage::delete('public/images/'.$dataPendaftar->foto);

        $dataPendaftar->delete();

        return redirect()->route('datapendaftar.index')->with(['success' => 'Data berhasil dihapus!']);
    }
    
}
