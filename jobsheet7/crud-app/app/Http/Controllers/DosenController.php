<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'desc')->get();

        return view('pages.dosen.index', ['dosen' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nidn' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            $data = [
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ];

            Dosen::create($data);

            return redirect('dosen')->with('addSuccess', 'Data Dosen berhasil disimpan.');
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
                'nidn' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);

            $data = [
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ];

            Dosen::where('id', $request->id)->update($data);

            return redirect('dosen')->with('editSuccess', 'Data Dosen berhasil disimpan.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::where('id', $id)->first()->delete();

        var_dump($dosen);

        return redirect('dosen')->with('deleteSuccess', 'Data Dosen berhasil dihapus.');
    }
}
