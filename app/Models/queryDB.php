<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class queryDB extends Model {

    public function fetchData($table) {
        $data = DB::table($table)->get();
        return $data;
    }
    public function fetchWhere($table, $col, $identifier) {
        $data = DB::table($table)->whereIn($col, $identifier)->get();
        return $data;
    }
    public function fetchJoinWhere($table, $table2, $id, $id2, $col, $identifier) {
        $data = DB::table($table)->join($table2, $id, '=', $id2)->where($col, $identifier)->get();
        return $data;
    }
    public function fetchBetween($table, $where, $param1, $param2) {
        $data = DB::table($table)->whereBetween($where, [$param1, $param2])->get();
        return $data;
    }

    public function addData($table, $arr) {
        DB::table($table)->insert($arr);
    }
    public function delData($table, $col, $identifier) {
        DB::table($table)->whereIn($col, $identifier)->delete();

    }
    public function updateData($table, $col, $identifier, $arr) {
        DB::table($table)->where($col, $identifier)->update($arr);
    }
    public function movePic($r, $path_img) {
        $r->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$r->img->extension();

        $r->img->move($path_img, $imageName);

        return '/'.$imageName;
    }
    public function removeFile($path) {
        File::delete($path);
    }

}
