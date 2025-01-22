<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar_count = Pendaftar::count();
        $male_count = Pendaftar::where('jenis_kelamin', 'Laki-Laki')->count();
        $female_count = Pendaftar::where('jenis_kelamin', 'Perempuan')->count();

        $pendaftar = Pendaftar::latest()->limit(10)->get(); 
        return view('dashboard.index', compact('pendaftar_count', 'male_count', 'female_count', 'pendaftar'));
    }
    
}
