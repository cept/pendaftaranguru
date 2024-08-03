<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'unique' => ':attribute sudah digunakan',
            'confirmed' => ':attribute konfirmasi tidak sesuai',
        ];

        $validatedAkun = $request->validate([
            'nama' => 'required|min:5|max:50',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|min:5|confirmed|max:50',
            'password_confirmation' => 'required|min:5|max:50',
        ], $messages);
        

        $validated = $request->validate([
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:30',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|min:10|max:15',
            'email' => 'required|max:25',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], $messages);

        DB::beginTransaction();

        try {
            // Simpan user
            $user = new User();
            $user->nama = $validatedAkun['nama'];
            $user->email = $validatedAkun['email'];
            $user->password = Hash::make($validatedAkun['password']);
            $user->save();

            // Simpan foto
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hashName());
            $validated['foto'] = $image->hashName();

            // Tambahkan user_id ke data pendaftar
            $validated['user_id'] = $user->id;

            // Simpan data pendaftar
            DataPendaftar::create($validated);

            DB::commit();

            return redirect()->route('datapendaftar.index')->with('success', 'Data berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal disimpan: ' . $e->getMessage());
        }

        // $image = $request->file('foto');
        // $image->storeAs('public/images', $image->hashName());
        // $validated['foto'] = $image->hashName();

        // DataPendaftar::create($validated);

        // return redirect()->route('datapendaftar.index')->with(['success' => 'Data berhasil disimpan!']);
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
            'nama' => 'required|max:50',
            'tempat_lahir' => 'required|max:30',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|min:10|max:15',
            'email' => 'required|max:25',
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
