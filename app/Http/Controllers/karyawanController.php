<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\queryDB;
use Illuminate\Http\Request;

class karyawanController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $table_name = 'karyawan';
    private $key = 'kry_id';

    public function karyawan() {
        $mdl = new queryDB();

        $data = $mdl->fetchData($this->table_name);

        return view('sections.masters.karyawan.main', ['db' => $data]);
    }

    public function add(Request $r) {
        $mdl = new queryDB();
        
        $data = [
          'kry_id' => $r->kry_id,
          'kry_nama' => $r->kry_nama,
          'kry_alamat' => $r->kry_alamat,
          'kry_jeniskel' => $r->kry_jeniskel,
        ];
        
        $mdl->addData($this->table_name, $data);
        
        return response()->json(['success']);
    }

    public function delete($id) {
        $mdl = new queryDB();
        
        $mdl->delData($this->table_name, $this->key, [$id]);

        return response()->json(['success']);
    }

    public function update(Request $r, $id) {
        $mdl = new queryDB();

        $data = [
            'kry_nama' => $r->kry_nama,
            'kry_alamat' => $r->kry_alamat,
            'kry_jeniskel' => $r->kry_jeniskel,
          ];

        $mdl->updateData($this->table_name, $this->key, $id, $data);

        return response()->json(['success']);
    }
}
