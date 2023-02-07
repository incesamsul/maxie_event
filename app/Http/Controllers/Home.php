<?php

namespace App\Http\Controllers;
use App\Models\Tamu;

class Home extends Controller
{

    public function index($idTamu = null){
        $data['tamu'] = Tamu::where('id_tamu', $idTamu)->first();
        $data['id_tamu'] = $idTamu;
        if($idTamu == null) {
            return view('v_home',$data);
        } else {
            return view('v_home',$data);
        }
    }

}
