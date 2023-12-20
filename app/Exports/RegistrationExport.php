<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrationExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // Declare $nomor as a static variable
    private static $nomor = 1;

    public function collection()
    {
        $registrations = Pendaftaran::select(
            'company_name',
            'sales_name',
            'user_name',
            'user_email',
            'user_phone',
            'user_company_name',
            'company_address',
            'company_industry',
            'deployment',
            'os_tipe',
            'jumlah_lisensi',
            'mdm_competitor',
            'poc_date',
            'budget_license',
        )->get();

        $data = $registrations->map(function ($registration) {
            return [
                'No' => self::$nomor++,
                'Partner Company Name' => $registration->company_name,
                'Apply by (Sales Name)' => $registration->sales_name,
                'End User PIC Full Name' => $registration->user_name,
                'End User Email' => $registration->user_email,
                'End User Phone Number' => $registration->user_phone,
                'End User Company Full Name' => $registration->user_company_name,
                'End User Company Address' => $registration->company_address,
                'End User Company Industry Type' => $registration->company_industry,
                'Deployment Type' => $registration->deployment,
                'OS type' => $registration->os_tipe,
                'Number of licenses' => $registration->jumlah_lisensi,
                'Current Exisiting MDM / Competitor' => $registration->mdm_competitor,
                'Demo / POC Date (Target)' => $registration->poc_date,
                'End User Budget Per License (in IDR)' => 'Rp. ' . $registration->budget_license . '.00',
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Partner Company Name',
            'Apply by (Sales Name)',
            'End User PIC Full Name',
            'End User Email',
            'End User Phone Number',
            'End User Company Full Name',
            'End User Company Address',
            'End User Company Industry Type',
            'Deployment Type',
            'OS type',
            'Number of licenses',
            'Current Exisiting MDM / Competitor',
            'Demo / POC Date (Target)',
            'End User Budget Per License (in IDR)',
        ];
    }
}
