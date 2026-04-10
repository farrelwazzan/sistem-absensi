<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with('user')->get();
        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereJsonContains('roles', 'guru_mapel')
                ->doesntHave('guru')
                ->get();

        if ($users->isEmpty()) {
            return redirect()->route('guru.index')
                ->with('error', 'Semua user guru sudah terdaftar sebagai guru');
        }

        return view('guru.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|unique:gurus,user_id',
        ]);

        Guru::create($validated);

        return redirect()->route('guru.index')
            ->with('success', 'Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        return view('guru.edit', compact('guru', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|unique:gurus,user_id,' . $guru->guru_id . ',guru_id',
        ]);

        $guru->update($validated);

        return redirect()->route('guru.index')
            ->with('success', 'Guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru->delete();
        return redirect()->route('guru.index')
            ->with('success', 'Guru berhasil dihapus');
    }
}
