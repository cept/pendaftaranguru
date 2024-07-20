<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\DataPendaftar;
use App\Models\DokumenPendaftar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalPelamar = DataPendaftar::count();
        $dokumenPelamar = DokumenPendaftar::count();
        $dataAlternatif = Alternatif::count();
        $increasePercentage = $this->calculateIncreasePercentage();
 
         return view('admin.dashboard', compact('dokumenPelamar', 'dataAlternatif', 'totalPelamar', 'increasePercentage'));
     }

    public function user()
    {
        return view('user.dashboard');
    }

    private function calculateIncreasePercentage()
    {
        // Ambil jumlah pelamar tahun ini
        $currentYear = now()->year;
        $lastYear = $currentYear - 1;

        $currentYearPelamar = DataPendaftar::whereYear('created_at', $currentYear)->count();
        $lastYearPelamar = DataPendaftar::whereYear('created_at', $lastYear)->count();

        if ($lastYearPelamar == 0) {
            return 100; // Hindari pembagian dengan nol
        }

        $increasePercentage = (($currentYearPelamar - $lastYearPelamar) / $lastYearPelamar) * 100;

        return $increasePercentage;
    }
}
