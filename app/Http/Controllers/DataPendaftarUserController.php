<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPendaftar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataPendaftarUserController extends Controller
{
    //
    public function index()
    {
        // Ambil data pendaftar untuk pengguna yang sedang login
        $pendaftar = DataPendaftar::where('id', Auth::id())->first();
        return view('user.datapendaftar.index', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25',
            'tempat_lahir' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], $messages);

        $data = $request->all();
        $data['id'] = Auth::id();

        $image = $request->file('foto');
        $image->storeAs('public/images', $image->hashName());
        $data['foto'] = $image->hashName();

        // if ($request->hasFile('foto')) {
        //     $data['foto'] = $request->file('foto')->store('foto', 'public/images');
        // }

        DataPendaftar::create($data);

        return redirect()->route('formdatapendaftar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);

        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
        ];

        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|email|max:25',
            'tempat_lahir' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ], $messages);

        $data = $request->all();

        if ($request->hasFile('foto')) {

            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());
            // Hapus foto lama
            if ($pendaftar->foto) {
                Storage::delete('public/images/'.$pendaftar->foto);
            }
            // Simpan foto baru
            $data['foto'] = $image->hashName();
        }

        $pendaftar->update($data);

        return redirect()->route('formdatapendaftar.index')->with('success', 'Data berhasil diperbarui');
    }
}
