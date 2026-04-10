<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
class SiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nis' => 'required|unique:siswa,nis',
        'nama' => 'required',
        'kelas_id' => 'required|exists:kelas,kelas_id',
        ]);

        Siswa::create([
            'nis'=> $request->nis,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.  
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nis' => 'required|unique:siswa,nis,' . $id . ',siswa_id',
        'nama' => 'required',
        'kelas_id' => 'required|exists:kelas,kelas_id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}
