<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MahasiswaController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $query = Mahasiswa::query();

        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%");
        }

        $mahasiswas = $query->latest()->paginate(5);

        return view('mahasiswa.index', compact('mahasiswas', 'search'));
    }

    public function create(): View
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // public function edit(Mahasiswa $mahasiswa): View
    // {
    //     return view('mahasiswa.edit', compact('mahasiswa'));
    // }

    // public function update(Request $request, Mahasiswa $mahasiswa): RedirectResponse
    // {
    //     $request->validate([
    //         'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
    //         'nama' => 'required',
    //         'jurusan' => 'required',
    //         'alamat' => 'required',
    //     ]);

    //     $mahasiswa->update($request->all());

    //     return redirect()->route('mahasiswa.index')
    //                      ->with('success', 'Data mahasiswa berhasil diperbarui.');
    // }

    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}