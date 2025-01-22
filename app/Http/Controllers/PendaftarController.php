<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        return view('pendaftar.index',[
            "title" => "Data Pendaftar",
            "data" => Pendaftar::all()
        ]);
    }

    public function create()
    {
        return view('pendaftar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tinggi_badan' => 'required|integer|min:150',
            'berat_badan' => 'required|integer|min:40',
            'prestasi' => 'nullable|string',
            
        ]);

        $data = $request->all();
        Pendaftar::create($data);
        return redirect()->route('pendaftar.index')->with('success', 'Pendaftaran berhasil!');
    }

  
    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.show', compact('pendaftar'));
    }

   
    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.edit', compact('pendaftar'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tinggi_badan' => 'required|integer|min:150',
            'berat_badan' => 'required|integer|min:40',
            'prestasi' => 'nullable|string',
            
        ]);

        $pendaftar = Pendaftar::findOrFail($id);

        $data = $request->all();
        $pendaftar->update($data);
        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();
        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus!');
    }
    
}
