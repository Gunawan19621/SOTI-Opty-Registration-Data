@extends('layouts.main')

@section('content')
    <style>
        .table th {
            white-space: nowrap;
        }

        .table td {
            white-space: nowrap;
        }

        /* CSS untuk menyesuaikan posisi kotak pencarian */
        .dataTables_filter {
            float: right;
            margin-bottom: 15px;
        }

        /* CSS untuk menyesuaikan posisi pagination */
        .dataTables_paginate {
            margin-top: 15px;
            float: right;
        }

        /* CSS untuk menyesuaikan jarak margin atas info entries */
        .dataTables_info {
            margin-top: 15px;
        }

        .table {
            border: 1px solid #d8d6d6
        }
    </style>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Terjadi kesalahan pada saat input data<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card m-4">
        <div class="row">
            <div class="col-6">
                <h2 class="m-4">SOTI Opty Registration Data</h2>
            </div>
            <div class="col-6">
                <div class="m-4 d-flex justify-content-end">
                    <a href="{{ route('pendaftaran.export') }}" class="btn btn-info btn-icon-split" target="_blank">
                        <span class="text">Export Exel</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Partner Company Name</th>
                        <th>Apply by (Sales Name)</th>
                        <th>End User PIC Full Name</th>
                        <th>End User Email</th>
                        <th>End User Phone Number</th>
                        <th>End User Company Full Name</th>
                        <th>End User Company Address</th>
                        <th>End User Company Industry Type</th>
                        <th>Deployment Type</th>
                        <th>OS type</th>
                        <th>Number of licenses</th>
                        <th>Current Existing MDM / Competitor (if Any)</th>
                        <th>Demo / POC Date (Target)</th>
                        <th>End User Budget per License per Year (in IDR) :</th>
                        <th>Registration date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($pendaftaran as $data_pendaftaran)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $data_pendaftaran->company_name }}</td>
                            <td>{{ $data_pendaftaran->sales_name }}</td>
                            <td>{{ $data_pendaftaran->user_name }}</td>
                            <td>{{ $data_pendaftaran->user_email }}</td>
                            <td>{{ $data_pendaftaran->user_phone }}</td>
                            <td>{{ $data_pendaftaran->user_company_name }}</td>
                            <td>{{ $data_pendaftaran->company_address }}</td>
                            <td>{{ $data_pendaftaran->company_industry }}</td>
                            <td>{{ $data_pendaftaran->deployment }}</td>
                            <td>{{ $data_pendaftaran->os_tipe }}</td>
                            <td>{{ $data_pendaftaran->jumlah_lisensi }}</td>
                            <td>{{ $data_pendaftaran->mdm_competitor }}</td>
                            <td>{{ \Carbon\Carbon::parse($data_pendaftaran->poc_date)->format('d-m-Y') }}</td>
                            <td>
                                @if ($data_pendaftaran->budget_license)
                                    Rp. {{ $data_pendaftaran->budget_license }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($data_pendaftaran->created_at)->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <p>Data Kosong</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Menambahkan skrip JavaScript untuk DataTables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
        < /scri> <
        script src = "https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" >
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true, // Aktifkan scroll horizontal
                responsive: true // Aktifkan resposive table
            });
        });
    </script>
@endsection
