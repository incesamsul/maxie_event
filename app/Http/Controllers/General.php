<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class General extends Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function dashboard()
    {
        $data['hadir_agen'] = Tamu::where('status_kehadiran','1')->where('status','agen')->get();
        $data['hadir_distributor'] = Tamu::where('status_kehadiran','1')->where('status','distributor')->get();
        $data['hadir_stokis'] = Tamu::where('status_kehadiran','1')->where('status','stokis')->get();

        $data['tidak_hadir_agen'] = Tamu::where('status_kehadiran','0')->where('status','agen')->get();
        $data['tidak_hadir_distributor'] = Tamu::where('status_kehadiran','0')->where('status','distributor')->get();
        $data['tidak_hadir_stokis'] = Tamu::where('status_kehadiran','0')->where('status','stokis')->get();
        $data['total_tidak_hadir'] = Tamu::where('status_kehadiran','0')->get();
        $data['total_hadir'] = Tamu::where('status_kehadiran','1')->get();

        $data['total_agen'] = Tamu::where('status','agen')->get();
        $data['total_distributor'] = Tamu::where('status','distributor')->get();
        $data['total_stokis'] = Tamu::where('status','stokis')->get();

        $data['total_tamu'] = Tamu::all();

        return view('pages.dashboard.index',$data);
    }

    public function profile()
    {
        $data['user'] = $this->userModel->getUserProfile(auth()->user()->id);
        return view('pages.profile.index', $data);
    }

    public function bantuan()
    {
        return view('pages.bantuan.index');
    }

    public function ubahRole(Request $request)
    {
        User::where('id', auth()->user()->id)
            ->update(['role' => $request->post('role')]);
        return redirect()->back();
    }

    public function ubahFotoProfile(Request $request)
    {

        $extensions = ['jpg', 'jpeg', 'png'];

        $result = array($request->foto->getClientOriginalExtension());

        if (in_array($result[0], $extensions)) {
            $file = $request->foto;
        } else {
            return redirect()->back()->with('error', 'format file tidak di dukung');
        }

        // $fileName = auth()->user()->email . "." . $request->foto->extension();
        $fileName = uniqid() . "." . $request->foto->extension();
        $request->foto->move(public_path('data/foto_profile/' . $fileName . '/'), $fileName);

        // Storage::disk('uploads')->put($fileName, file_get_contents($request->foto->getRealPath()));

        User::where('id', auth()->user()->id)
            ->update(['foto' => $fileName]);
        return redirect()->back();
    }
}
