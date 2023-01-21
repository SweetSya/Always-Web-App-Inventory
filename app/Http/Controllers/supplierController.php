<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\queryDB;
use Illuminate\Http\Request;

class supplierController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    private $table_name = 'supplier';
    private $key = 'sup_id';

    public function supplier() {
        $mdl = new queryDB();

        $data = $mdl->fetchData($this->table_name);

        return view('sections.masters.supplier.main', ['db' => $data]);
    }

    public function add(Request $r) {
        $mdl = new queryDB();
        
        $data = [
          'sup_id' => $r->sup_id,
          'sup_nama' => $r->sup_nama,
          'sup_alamat' => $r->sup_alamat,
          'sup_telp' => $r->sup_telp,
          'sup_keterangan' => $r->sup_keterangan,
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
            'sup_nama' => $r->sup_nama,
            'sup_alamat' => $r->sup_alamat,
            'sup_telp' => $r->sup_telp,
            'sup_keterangan' => $r->sup_keterangan,
          ];
        
          $mdl->updateData($this->table_name, $this->key, $id, $data);
        
        return response()->json(['success']);
    }
}
