<?php

namespace App\Http\Controllers;

use App\Models\CekData;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class CekDataController extends Controller
{
    public function index()
    {
        return view('cek_data.index',[
            "title" => "Data Pendaftar",
            "data" => CekData::all()
        ]); 
    }

    public function create()
    {
       
        $pendaftar = Pendaftar::all();
        return view('cek_data.create', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'status_seleksi' => 'required|in:diterima,ditolak,pending',
            'catatan' => 'nullable|string',
        ]);


        CekData::create($request->all());
        return redirect()->route('cek_data.index')->with('success', 'Data cek berhasil ditambahkan.');
    }
}
