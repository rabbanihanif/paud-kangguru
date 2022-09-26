<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class TaController extends BaseController
{

    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Ajaran',
            'subtitle' => 'Tahun ajaran',
            'ta' => $this->ModelTa->getAllData(),
        ];
        return view('admin/ta/list', $data);
    }

    public function create()
    {
        helper('form');
        $data['title'] = "Tambah Tahun Ajaran";
        return view('admin/ta/create', $data);
    }


    public function insert()
    {
        $data = [
            'ta' => $this->request->getPost('ta'),
            'tahun' => $this->request->getPost('tahun')
        ];

        $this->ModelTa->insertData($data);
        session()->setFlashdata('success', 'Data Tahun Ajaran berhasil ditambah');
        return redirect()->to('admin/ta');
    }




    public function aktif($id)
    {
        $model = model(ModelTa::class);
        // update status 
        $model->set(['status' => '0'])->update();
        $model->where('status', '0')->where('id_ta', $id)->set(['status' => '1'])->update();
        session()->setFlashdata('success', 'Tahun Ajaran berhasil aktif');
        return redirect('ta.index');
    }

    public function nonaktif($id)
    {

        // update status 
        model(ModelTa::class)->where('status', 1)
            ->where('id_ta', $id)
            ->set([
                'status' => '0'
            ])->update();
        session()->setFlashdata('msg', 'Tahun Ajaran telah dinonaktif');
        return redirect('ta.index');
    }


    public function destroy()
    {
        $model = model(ModelTa::class);
        // $model->delete($this->request->getPost('id_ta'));
        $model->where('id_ta', $this->request->getPost('id_ta'))->delete();

        return redirect('ta.index');
    }
}
