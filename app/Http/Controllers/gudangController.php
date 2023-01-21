<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\queryDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class gudangController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $table_name = 'gudang';
    private $key = 'order_id';

    private $table_name_2 = 'detail_gudang';
    private $key_2 = 'order_id';

    public function gudang() {
        $mdl = new queryDB();
        $data = $mdl->fetchData($this->table_name);

        return view('sections.gudang.main', ['db' => $data]);
    }
    public function add(Request $r, $total) {
        $mdl = new queryDB();
        $data = [
          'order_id'=> $r->order_id,
          'order_date'=> $r->order_date,
          'sup_id'=> $r->sup_id,
          'order_keterangan'=> $r->order_keterangan,
          'order_total'=> $total,
        ];
        $mdl->addData($this->table_name, $data);

        return response()->json(['success']);
    }

    public function adddetil($order_id, $brg_id, $nama, $jumlah, $harga, $subtotal) {
        $mdl = new queryDB();

        $data = [
          'order_id'=> $order_id, 
          'dg_brg_id'=> $brg_id,
          'dg_brg_nama'=> $nama,
          'dg_jumlah'=> $jumlah,
          'dg_brg_harga'=> $harga,
          'dg_subtotal'=> $subtotal,
        ];

        Log::info($data);
        $mdl->addData($this->table_name_2, $data);
        
        return response()->json(['success']);
    }
}
