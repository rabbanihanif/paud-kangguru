<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class PenggunaController extends BaseController
{
    protected $penggunaModel;

    public function index()
    {
        $data['title'] = "Data Pengguna";

        $data['data'] = model(Pengguna::class)->where('level', 'ortu')->findAll();


        // dd($data);
        return view('admin/pengguna/list', $data);
    }

    public function destroy()
    {
        $model = model(Pengguna::class);
        $model->delete($this->request->getPost('id_pengguna'));
        return redirect('pengguna.index');
    }
}
