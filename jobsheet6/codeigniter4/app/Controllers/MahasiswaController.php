<?php

namespace App\Controllers;

use \App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    protected $mhsModel;

    public function __construct()
    {
        $this->mhsModel = new Mahasiswa;
    }

    public function index()
    {
        $mahasiswa = $this->mhsModel->findAll();

        return view('mahasiswa/index', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        return view('mahasiswa/tambah', [
            'validation' => \Config\Services::validation(),
            'input' => ['nim' => '', 'nama' => '', 'alamat' => '']
        ]);
    }

    public function store()
    {
        $data = [
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ];

        if (!$this->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ])) {
            return view('mahasiswa/tambah', [
                'validation' => $this->validator,
                'input' => $data,
            ]);
        }

        $this->mhsModel->save($data);

        $validData = $this->validator->getValidated();
        session()->setFlashdata('message', 'data berhasil ditambah');
        return redirect()->to(base_url() . "/mahasiswa");
    }

    public function edit()
    {
        $mahasiswa = $this->mhsModel->find($this->request->getGet('id'));
        // dd($mahasiswa);

        return view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ];

        if (!$this->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ])) {
            return view('mahasiswa/edit', [
                'validation' => $this->validator,
                'mahasiswa' => $data,
            ]);
        }

        $this->mhsModel->where('id', $this->request->getVar('id'))->save($data);

        session()->setFlashdata('message', 'data berhasil diedit');
        return redirect()->to(base_url() . "/mahasiswa");
    }

    public function delete()
    {
        $id = $this->request->getGet('id');

        $this->mhsModel->where('id', $id)->delete();

        session()->setFlashdata('message', 'data berhasil dihapus');
        return redirect()->to(base_url() . "/mahasiswa");
    }
}
