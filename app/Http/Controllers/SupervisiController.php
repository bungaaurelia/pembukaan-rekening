<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomerService;
use App\Models\CustomerServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisiController extends Controller
{
    public function pengajuan()
    {
        $pengajuan = CustomerServiceModel::get();
        return view('pengajuan', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $update = CustomerServiceModel::findOrFail($id);
        
        if ($request->has('approve')) {
            $update->update([
                // 'nama_nasabah'  => $request->input('nama_nasabah'),
                // 'tempat_lahir'  => $request->input('tempat_lahir'),
                // 'tanggal_lahir' => $request->input('tanggal_lahir'),
                // 'jenis_kelamin' => $request->input('jenis_kelamin'),
                // 'pekerjaan'     => $request->input('pekerjaan'),
                // 'nominal_setor' => $request->input('nominal_setor'),
                'status'        => 'Disetujui',
            ]);

            return redirect('supervisi/pengajuan-rekening/view')->with('success', 'Data Berhasil Disetujui!');
        }
        return redirect('supervisi/pengajuan-rekening/view')->with('error', 'Data Gagal Disetujui!');
    }
}