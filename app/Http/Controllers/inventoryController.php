<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\queryDB;
use Illuminate\Support\Facades\Log;

class inventoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $table_name = 'inventory';
    private $key = 'brg_id';
    
    
    public function inventory() {
        $mdl = new queryDB();
        $data = $mdl->fetchData($this->table_name);

        return view('sections.masters.inventory.main', ['db'=>$data]);
    }

    public function add(Request $r) {
        $mdl = new queryDB();
        
        $data = [
          'brg_id' => $r->brg_id,
          'brg_nama' => $r->brg_nama,
          'brg_harga_jual' => $r->brg_harga_jual,
          'brg_harga_beli' => $r->brg_harga_beli,
          'brg_stok' => $r->brg_stok,
          'brg_supplier_id' => $r->brg_supplier_id
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
            'brg_nama' => $r->brg_nama,
            'brg_harga_jual' => $r->brg_harga_jual,
            'brg_harga_beli' => $r->brg_harga_beli,
            'brg_stok' => $r->brg_stok,
            'brg_supplier_id' => $r->brg_supplier_id
        ];

        $mdl->updateData($this->table_name, $this->key, $id, $data);

        return response()->json(['success']);
    }
}
