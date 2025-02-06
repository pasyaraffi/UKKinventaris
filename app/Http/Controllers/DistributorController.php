<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Distributor::create($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $distributor = Distributor::findOrFail($id);
            $distributor->delete();
            return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus.');
        }catch (\Exception $e) {
            return redirect()->route('distributor.index')->with('error', 'Distributor tidak dapat di hapus karena sedang berelasi ke tabel lain!');
        }
       
    }
}
