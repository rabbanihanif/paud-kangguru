<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Dokumen;
use App\Models\Murid;
use App\Models\Ortu;
use App\Models\Pengguna;

class PlaygroupController extends BaseController
{
    public function __construct()
    {
        $this->modelMurid = new Murid();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Ajaran',
            'subtitle' => 'Tahun ajaran',
            'ta' => $this->modelMurid->getAllData(),
        ];
        return view('admin/pg/list', $data);
    }
}
