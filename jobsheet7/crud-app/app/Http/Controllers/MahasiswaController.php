<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();

        return view('pages.mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            $data = [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ];

            Mahasiswa::create($data);

            return redirect('mahasiswa')->with('addSuccess', 'Data Mahasiswa berhasil disimpan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            $data = [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ];

            Mahasiswa::where('id', $request->id)->update($data);

            return redirect('mahasiswa')->with('editSuccess', 'Data Mahasiswa berhasil disimpan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first()->delete();

        var_dump($mahasiswa);

        return redirect('mahasiswa')->with('deleteSuccess', 'Data Mahasiswa berhasil dihapus.');
    }
}
