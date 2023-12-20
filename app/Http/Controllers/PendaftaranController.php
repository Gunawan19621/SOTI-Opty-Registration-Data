<?php

namespace App\Http\Controllers;

use App\Exports\RegistrationExport;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    // dalam file PendaftaranController.php
    public function index()
    {
        $data = [
            'pendaftaran' => Pendaftaran::get(),
        ];
        return view('formulir_pendaftaran_soti_opty.index', $data);
    }

    public function create()
    {
        return view('formulir_pendaftaran_soti_opty.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'company_name' => 'required',
                'sales_name' => 'required',
                'user_name' => 'required',
                'user_email' => 'required',
                'user_phone' => 'required', // Sesuaikan panjang maksimal dengan kebutuhan
                'user_company_name' => 'required',
                'company_address' => '',
                'company_industry' => 'required',
                'other_industry' => 'required_if:company_industry,Yang Lain', // Hanya diperlukan jika industry == "Yang Lain"
                'deployment' => 'required',
                'os_type' => 'required|array', // Change 'os_tipe' to 'os_type'
                'os_type.*' => 'string|max:255', // Change 'os_tipe' to 'os_type'
                'jumlah_lisensi' => 'required',
                'mdm_competitor' => 'required',
                'poc_date' => 'required',
                'budget_license' => '',
            ]);
            // Fix the typo and update the field name for the table
            $validatedData['os_tipe'] = implode(',', $validatedData['os_type']);
            unset($validatedData['os_type']);
            // dd($validatedData);

            // Simpan data ke database
            if ($request->input('company_industry') === 'Yang Lain') {
                $validatedData['company_industry'] = $validatedData['other_industry'];
            }

            unset($validatedData['other_industry']); // Hapus 'other_industry' agar tidak disimpan sebagai kolom terpisah


            // Simpan data ke database
            // dd($validatedData);
            Pendaftaran::create($validatedData);

            return back()->with('success', 'Registration saved successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to save data. Please try again.');
        }
    }

    //export exel
    public function export()
    {
        // dd('test');
        return Excel::download(new RegistrationExport, 'Registration Data.xlsx');
    }
}
