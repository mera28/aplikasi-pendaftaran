<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftarController extends Controller
{
    public function index()
    {
        return view('pendaftar.index', [
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
            'foto' => 'nullable|image|file|max:1024',
            'dokumen' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only([
            'nama', 'alamat', 'nomor_telepon', 'tanggal_lahir', 
            'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'prestasi'
        ]);

        // Proses file foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        // Proses file dokumen
        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('documents', 'public');
        }

        Pendaftar::create($data);

        return redirect()->route('pendaftar.index')->with('success', 'Pendaftaran berhasil!');
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
            'foto' => 'nullable|image|file|max:1024',
            'dokumen' => 'nullable|mimes:pdf|max:2048',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $data = $request->only([
            'nama', 'alamat', 'nomor_telepon', 'tanggal_lahir', 
            'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'prestasi'
        ]);

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            if ($pendaftar->foto) {
                Storage::delete('public/' . $pendaftar->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        // Update dokumen jika ada file baru
        if ($request->hasFile('dokumen')) {
            if ($pendaftar->dokumen) {
                Storage::delete('public/' . $pendaftar->dokumen);
            }
            $data['dokumen'] = $request->file('dokumen')->store('documents', 'public');
        }

        $pendaftar->update($data);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        return view('pendaftar.show', compact('pendaftar'));
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        // Hapus file terkait
        if ($pendaftar->foto) {
            Storage::delete('public/' . $pendaftar->foto);
        }

        if ($pendaftar->dokumen) {
            Storage::delete('public/' . $pendaftar->dokumen);
        }

        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus!');
    }


}
