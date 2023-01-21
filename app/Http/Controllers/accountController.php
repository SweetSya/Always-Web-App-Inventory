<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\queryDB;

class accountController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function account() {
        return view('sections.account.main');
    }

    public function uploadimage(Request $r) {
        $mod = new queryDB();
        $path = 'res/users/img';

        $data = $mod->fetchWhere('users', 'id', [Auth::user()->id]);
        
        if($data[0]->img != null) {
            $mod->removeFile($data[0]->img);
        }

        $img_path = $path.$mod->movePic($r, $path);
        $data = [
            'img' => $img_path,
        ];
        $mod->updateData('users', 'id', Auth::user()->id, $data);

        return response()->json(['success']);
    }
}