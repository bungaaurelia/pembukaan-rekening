<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomerService;
use App\Models\CustomerServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerServiceController extends Controller
{
    public function create()
    {
        return view('customerservice.create');
    }

    public function generateRandomId($length)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $id = '';
        for ($i = 0; $i < $length; $i++) {
            $id .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $id;
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $id = $this->generateRandomId(5);

        $nominal_setor = $request->input('nominal_setor');
        
        $nominal_setor = str_replace(['Rp. ', '.'], '', $nominal_setor);

        $save = CustomerServiceModel::create([
            'id_nasabah'  => $id,
            'nama_nasabah'  => $request->input('nama_nasabah'),
            'tempat_lahir'  => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'pekerjaan'     => $request->input('pekerjaan'),
            'nominal_setor' => $nominal_setor,
            'status' => "Menunggu Approval",
        ]);


        if ($save) {
            return redirect('customerservice/dashboard')->with('success', 'Data Berhasil Disimpan!');
        } else {
            return redirect('customerservice/create')->with('error', 'Data Gagal Disimpan!');
        }
    }

    public function pengajuan()
    {
        $pengajuan = CustomerServiceModel::get();
        return view('customerservice.pengajuan', compact('pengajuan'));
    }
}
