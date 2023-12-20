<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftarans';

    protected $fillable = [
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
        'created_by',
        'updated_by',
    ];
}
