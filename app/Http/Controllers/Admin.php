<?php

namespace App\Http\Controllers;

use App\Models\LastScanned;
use App\Models\User;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{

    protected $userModel;
    protected $profileUserModel;
    protected $kritikSaranModel;
    protected $kuisionerModel;
    protected $penilaianModel;


    public function __construct()
    {
        $this->userModel = new User();
    }

    public function pengguna()
    {
        $data['pengguna'] = $this->userModel->getAllUser();
        return view('pages.pengguna.index', $data);
    }

    public function tamu($status = null)
    {
        if($status == 'confirm') {
            $data['tamu'] = Tamu::where('konfirmasi_tamu','1')->get();
        } else if($status == 'not_confirm') {
            $data['tamu'] = Tamu::where('konfirmasi_tamu','0')->get();
        } else if($status != null){
            $data['tamu'] = Tamu::where('status', $status)->get();
        } else {
            $data['tamu'] = Tamu::all();
        }
        return view('pages.tamu.index',$data);
    }

    public function rekapTamuHadir($status = null)
    {
        if($status != null){
            $data['tamu'] = Tamu::where('status_kehadiran','1')->where('status', $status)->get();
        } else {
            $data['tamu'] = Tamu::where('status_kehadiran','1')->get();
        }
        return view('pages.rekap_tamu.index',$data);
    }

    public function rekapTamuTidakHadir($status = null)
    {
        if($status != null){
            $data['tamu'] = Tamu::where('status_kehadiran','0')->where('status', $status)->get();
        } else {
            $data['tamu'] = Tamu::where('status_kehadiran','0')->get();
        }
        return view('pages.rekap_tamu.index',$data);
    }

    public function sambutan(){
        return view('pages.sambutan.index');
    }

    public function scanner(){
        return view('pages.scanner.index');
    }

    public function cekTamu($idTamu){
        $lastScanned = LastScanned::where('id_tamu',$idTamu)->first();
        if($lastScanned) {
            return 1;
        } else {
            return 0;
        }
    }

    public function terimaTamu($idTamu) {

        $lastScanned = LastScanned::where('id_tamu', $idTamu)->first();
        if(!$lastScanned) {
            LastScanned::create([
                'id_tamu' => $idTamu
            ]);
            Tamu::where('id_tamu', $idTamu)->update([
                'status_kehadiran' => '1'
            ]);
        }

        return redirect()->back();
    }


    public function profileUser()
    {
        $data['user'] = User::all();
        $data['profile'] = $this->profileUserModel->getProfileUser();
        return view('pages.rekaptulasi_data.index', $data);
    }

    public function getLastScanned(){
        return LastScanned::where('expired','0')->orderBy('id_last_scanned','desc')->with('tamu')->latest()->first();
    }

    public function clearLastScanned(){
        // LastScanned::query()->delete();
        LastScanned::where('expired','0')->orderBy('id_last_scanned','desc')->take(1)->update([
            'expired' => '1',
        ]);
        return 1;
    }




    // fetch data user by admin
    function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if ($request->filter == "") {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            } else {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('role', '=', $request->filter)
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            }

            return view('pages.pengguna.users_data', $data)->render();
        }
    }

    public function createPengguna(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di tambahkan');
    }

    public function updatePengguna(Request $request)
    {
        $user = User::where([
            ['id', '=', $request->id]
        ])->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di update');
    }

    public function deletePengguna(Request $request)
    {
        User::destroy($request->post('user_id'));
        return 1;
    }

    // crud tamu

    public function konfirmasiTamu(Request $request) {
        $user = Tamu::where([
            ['id_tamu', '=', $request->id_tamu]
        ])->update([
            'konfirmasi_tamu' => '1',
        ]);
        return 1;
    }

    public function cancelKonfirmasiTamu(Request $request) {
        $user = Tamu::where([
            ['id_tamu', '=', $request->id_tamu]
        ])->update([
            'konfirmasi_tamu' => '0',
        ]);
        return 1;
    }

    public function cadangkanKonfirmasiTamu(Request $request) {
        $user = Tamu::where([
            ['id_tamu', '=', $request->id_tamu]
        ])->update([
            'konfirmasi_tamu' => '2',
        ]);
        return 1;
    }

    public function createTamu(Request $request)
    {
        $tamu = Tamu::where('whatsapp', $request->whatsapp)->first();
        if($tamu) {
            return redirect()->back()->with('error', 'Data anda telah terdaftar silahkan tunggu info lebih lanjut ');
        } else {
            Tamu::create([
                'no_team' => $request->no_team,
                'facebook' => $request->facebook,
                'whatsapp' => $request->whatsapp,
                'status' => $request->status,
                'kota_asal' =>  $request->kota_asal,
            ]);
            return redirect()->back()->with('message', 'Data anda telah terimpan !, Undangan digital anda akan di kirim ke nomor whatsap yang anda daftar jika data telah di setujui');
        }
    }

    public function updateTamu(Request $request)
    {
        $user = Tamu::where([
            ['id_tamu', '=', $request->id]
        ])->update([
            'no_team' => $request->no_team,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
            'kota_asal' =>  $request->kota_asal,
        ]);
        return redirect()->back()->with('message', 'tamu Berhasil di update');
    }

    public function deleteTamu(Request $request)
    {
        $user = Tamu::where([
            ['id_tamu', '=', $request->id_tamu]
        ])->delete();
        return 1;
    }


}
