<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RankingController extends Controller
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
        
        $rankings = [];
        foreach ($alternatifs as $alternatif) {
            $norPendidikan = ($maxPendidikan != 0) ? $alternatif->pendidikan / $maxPendidikan : 0;
            $norIPK = ($maxIPK != 0) ? $alternatif->ipk / $maxIPK : 0;
            $norPengalaman = ($maxPengalaman != 0) ? $alternatif->pengalaman_kerja / $maxPengalaman : 0;
            $norUsia = ($alternatif->usia != 0) ? $minUsia / $alternatif->usia : 0;

            $totalPendidikan = $norPendidikan * $kriteria->pendidikan / 100;
            $totalIPK = $norIPK * $kriteria->ipk / 100;
            $totalPengalaman = $norPengalaman * $kriteria->pengalaman_kerja / 100;
            $totalUsia = $norUsia * $kriteria->usia / 100;
            $rankings[] = [
                'id_pendaftar' => $alternatif->id_pendaftar,
                'alternatif' => $alternatif,
                'total' => $totalPendidikan + $totalIPK + $totalPengalaman + $totalUsia,
            ];
        }
        
        usort($rankings, function($a, $b) {
            return $b['total'] <=> $a['total'];
        });
        
        return view('admin.ranking.index', compact('rankings'));
    }
}
