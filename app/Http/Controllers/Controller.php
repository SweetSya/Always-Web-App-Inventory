<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\queryDB;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fetchData($table) {
        $mdl = new queryDB();
        $data = $mdl->fetchData($table);

        return response()->json($data);
    }

    public function fetchWhere($table, $col, $identifier) {
        $mdl = new queryDB();
        $data = $mdl->fetchWhere($table, $col, [$identifier]);

        return response()->json($data);
    }
    public function fetchJoinWhere($table, $table2, $id, $id2, $col, $identifier) {
        $mdl = new queryDB();
        $data = $mdl->fetchJoinWhere($table, $table2, $id, $id2, $col, $identifier);

        return response()->json($data);
    }
    public function fetchFilterData($table, $where, $param1, $param2) {
        $mdl = new queryDB();
        $data = $mdl->fetchBetween($table, $where, $param1, $param2);

        return response()->json($data);
    }
}
