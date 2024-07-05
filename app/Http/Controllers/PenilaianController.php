<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\DataPendaftar;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenilaianController extends Controller
{
    //
    public function index(): View
    {
        $alternatifs = Alternatif::all();
        $maxPendidikan = $alternatifs->max('pendidikan');
        $maxIPK = $alternatifs->max('ipk');
        $maxPengalaman = $alternatifs->max('pengalaman_kerja');
        $minUsia = $alternatifs->min('usia');

        $kriteria = Kriteria::all()->first();
        
        $normalisasis = [];
        $totalDatas = [];
        foreach ($alternatifs as $alternatif) {
            $norPendidikan = ($maxPendidikan != 0) ? $alternatif->pendidikan / $maxPendidikan : 0;
            $norIPK = ($maxIPK != 0) ? $alternatif->ipk / $maxIPK : 0;
            $norPengalaman = ($maxPengalaman != 0) ? $alternatif->pengalaman_kerja / $maxPengalaman : 0;
            $norUsia = ($alternatif->usia != 0) ? $minUsia / $alternatif->usia : 0;

            $normalisasis[] = [
                'id_pendaftar' => $alternatif->id_pendaftar,
                'alternatif' => $alternatif,
                'pendidikan' => $norPendidikan,
                'ipk' => $norIPK,
                'pengalaman_kerja' => $norPengalaman,
                'usia' => $norUsia,
            ];

            $totalPendidikan = $norPendidikan * $kriteria->pendidikan / 100;
            $totalIPK = $norIPK * $kriteria->ipk / 100;
            $totalPengalaman = $norPengalaman * $kriteria->pengalaman_kerja / 100;
            $totalUsia = $norUsia * $kriteria->usia / 100;
            $totalDatas[] = [
                'id_pendaftar' => $alternatif->id_pendaftar,
                'alternatif' => $alternatif,
                'pendidikan' => $totalPendidikan,
                'ipk' => $totalIPK,
                'pengalaman_kerja' => $totalPengalaman,
                'usia' => $totalUsia,
                'total' => $totalPendidikan + $totalIPK + $totalPengalaman + $totalUsia,
            ];
        }
        
        return view('admin.penilaian.index', compact('alternatifs', 'normalisasis', 'totalDatas'));
    }

    // public function create(): View
    // {
    //     $data_pendaftars = DataPendaftar::all();
    //     return view('admin.penilaian.create', compact('data_pendaftars'));
    // }

    // public function store(Request $request)
    // {
    //     $messages = [
    //         'required' => ':attribute wajib diisi',
    //         'min' => ':attribute minimal :min karakter',
    //         'max' => ':attribute maximal :max karakter',
    //     ];

    //     $validated = $request->validate([
    //         'id_pendaftar' => 'required',
    //         'pendidikan' => 'required',
    //         'ipk' => 'required',
    //         'usia' => 'required',
    //         'pengalaman_kerja' => 'required',
    //     ], $messages);

    //     $pendaftarExists = DataPendaftar::where('id', $request->id_pendaftar)->exists();

    //     if (!$pendaftarExists) {
    //         return redirect()->back()->withErrors(['id_pendaftar' => 'Id User tidak sesuai dengan data yang ada.'])->withInput();
    //     }

    //     Penilaian::create($validated);

    //     return redirect()->route('penilaian.index')->with(['success' => 'Data berhasil disimpan!']);
    // }

    // public function edit(string $id): View
    // {
    //     $penilaian = Penilaian::findOrFail($id);
    //     $data_pendaftars = DataPendaftar::all();
    //     return view('admin.penilaian.edit', compact('penilaian', 'data_pendaftars'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $messages = [
    //         'required' => ':attribute wajib diisi',
    //         'min' => ':attribute minimal :min karakter',
    //         'max' => ':attribute maximal :max karakter',
    //     ];

    //     $validated = $request->validate([
    //         'pendidikan' => 'required',
    //         'ipk' => 'required',
    //         'usia' => 'required',
    //         'pengalaman_kerja' => 'required',
    //     ], $messages);

    //     $penilaian = Penilaian::findOrFail($id);

    //     $penilaian->update($validated);
    //     return redirect()->route('penilaian.index')->with(['success' => 'Data berhasil diubah!']);
    // }

    // public function destroy($id)
    // {
    //     $penilaian = Penilaian::findOrFail($id);

    //     $penilaian->delete();

    //     return redirect()->route('penilaian.index')->with(['success' => 'Data berhasil dihapus!']);
    // }

}
