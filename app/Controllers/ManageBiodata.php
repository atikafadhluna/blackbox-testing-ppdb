<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelManageBiodata;
use App\Models\ModelAdmin;

class ManageBiodata extends BaseController
{
    public function __construct()
    {
        $this->ModelManageBiodata = new ModelManageBiodata();
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    // pekerjaan
    public function ManagePekerjaan()
    {
        $data = [
            'title' => 'Manage Pekerjaan',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'pekerjaan' => $this->ModelManageBiodata->getAllPekerjaan(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/biodata/manage_pekerjaan', $data);
    }

    public function insertPekerjaan()
    {
        $data = [
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];

        $this->ModelManageBiodata->insertPekerjaan($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('ManageBiodata/ManagePekerjaan'));
    }

    public function editPekerjaan($id_pekerjaan)
    {
        $data = [
            'id_pekerjaan' => $id_pekerjaan,
            'pekerjaan' => $this->request->getPost('pekerjaan'),
        ];

        $this->ModelManageBiodata->editPekerjaan($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('ManageBiodata/ManagePekerjaan'));
    }

    public function deletePekerjaan($id_pekerjaan)
    {
        $data = [
            'id_pekerjaan' => $id_pekerjaan,
        ];

        $this->ModelManageBiodata->deletePekerjaan($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('ManageBiodata/ManagePekerjaan'));
    }
    // pekerjaan



    //pendidikan
    public function ManagePendidikan()
    {
        $data = [
            'title' => 'Manage Pendidikan',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'pendidikan' => $this->ModelManageBiodata->getAllPendidikan(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/biodata/manage_pendidikan', $data);
    }

    public function insertPendidikan()
    {
        $data = [
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];

        $this->ModelManageBiodata->insertPendidikan($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('ManageBiodata/ManagePendidikan'));
    }

    public function editPendidikan($id_pendidikan)
    {
        $data = [
            'id_pendidikan' => $id_pendidikan,
            'pendidikan' => $this->request->getPost('pendidikan'),
        ];

        $this->ModelManageBiodata->editPendidikan($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('ManageBiodata/ManagePendidikan'));
    }

    public function deletePendidikan($id_pendidikan)
    {
        $data = [
            'id_pendidikan' => $id_pendidikan,
        ];

        $this->ModelManageBiodata->deletePendidikan($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('ManageBiodata/ManagePendidikan'));
    }
    //pendidikan



    //penghasilan
    public function ManagePenghasilan()
    {
        $data = [
            'title' => 'Manage Penghasilan',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'penghasilan' => $this->ModelManageBiodata->getAllPenghasilan(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/biodata/manage_penghasilan', $data);
    }

    public function insertPenghasilan()
    {
        $data = [
            'penghasilan' => $this->request->getPost('penghasilan'),
        ];

        $this->ModelManageBiodata->insertPenghasilan($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('ManageBiodata/ManagePenghasilan'));
    }

    public function editPenghasilan($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
            'penghasilan' => $this->request->getPost('penghasilan'),
        ];

        $this->ModelManageBiodata->editPenghasilan($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('ManageBiodata/ManagePenghasilan'));
    }

    public function deletePenghasilan($id_penghasilan)
    {
        $data = [
            'id_penghasilan' => $id_penghasilan,
        ];

        $this->ModelManageBiodata->deletePenghasilan($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('ManageBiodata/ManagePenghasilan'));
    }
    //penghasilan

    //agama
    public function ManageAgama()
    {
        $data = [
            'title' => 'Manage Agama',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'agama' => $this->ModelManageBiodata->getAllAgama(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/biodata/manage_agama', $data);
    }

    public function insertAgama()
    {
        $data = [
            'agama' => $this->request->getPost('agama'),
        ];

        $this->ModelManageBiodata->insertAgama($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('ManageBiodata/ManageAgama'));
    }

    public function editAgama($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
            'agama' => $this->request->getPost('agama'),
        ];

        $this->ModelManageBiodata->editAgama($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('ManageBiodata/ManageAgama'));
    }

    public function deleteAgama($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
        ];

        $this->ModelManageBiodata->deleteAgama($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('ManageBiodata/ManageAgama'));
    }
    //Agama


    //Kegemaran
    public function ManageKegemaran()
    {
        $data = [
            'title' => 'Manage Kegemaran',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'kegemaran' => $this->ModelManageBiodata->getAllKegemaran(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/biodata/manage_kegemaran', $data);
    }

    public function insertKegemaran()
    {
        $data = [
            'kegemaran' => $this->request->getPost('kegemaran'),
        ];

        $this->ModelManageBiodata->insertKegemaran($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('ManageBiodata/ManageKegemaran'));
    }

    public function editKegemaran($id_kegemaran)
    {
        $data = [
            'id_kegemaran' => $id_kegemaran,
            'kegemaran' => $this->request->getPost('kegemaran'),
        ];

        $this->ModelManageBiodata->editKegemaran($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('ManageBiodata/ManageKegemaran'));
    }

    public function deleteKegemaran($id_kegemaran)
    {
        $data = [
            'id_kegemaran' => $id_kegemaran,
        ];

        $this->ModelManageBiodata->deleteKegemaran($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('ManageBiodata/ManageKegemaran'));
    }
    //Kegemaran
}
