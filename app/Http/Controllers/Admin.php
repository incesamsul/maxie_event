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

    public function tamu()
    {
        $data['tamu'] = Tamu::all();
        return view('pages.tamu.index',$data);
    }

    public function sambutan(){
        return view('pages.sambutan.index');
    }

    public function scanner(){
        return view('pages.scanner.index');
    }

    public function terimaTamu($idTamu) {
        LastScanned::create([
            'id_tamu' => $idTamu
        ]);

        Tamu::where('id_tamu', $idTamu)->update([
            'status_kehadiran' => '1'
        ]);
        return redirect()->back();
    }


    public function profileUser()
    {
        $data['user'] = User::all();
        $data['profile'] = $this->profileUserModel->getProfileUser();
        return view('pages.rekaptulasi_data.index', $data);
    }

    public function getLastScanned(){
        return LastScanned::with('tamu')->latest()->first();
    }

    public function clearLastScanned(){
        LastScanned::query()->delete();
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

    public function createTamu(Request $request)
    {
        Tamu::create([
            'no_team' => $request->no_team,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
            'kota_asal' =>  $request->kota_asal,
        ]);
        return redirect()->back()->with('message', 'tamu Berhasil di tambahkan');
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
