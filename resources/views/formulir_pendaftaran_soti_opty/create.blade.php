@extends('layouts.main')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div id="errorAlert" class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <h2 class="text-center">SOTI Opty Registration Data</h2>
                        <hr class="border">
                        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data"
                            id="pendaftaranForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="company_name" style="font-weight: bold;">Partner Company Name : <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control"
                                    placeholder="Enter the Partner Company Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sales_name" style="font-weight: bold;">Apply by (Sales Name) : <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="sales_name" class="form-control"
                                    placeholder="Enter the Sales Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_name" style="font-weight: bold;">End User PIC Full Name : <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="user_name" class="form-control"
                                    placeholder="Enter the Full Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_email" style="font-weight: bold;">End User Email : <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="user_email" class="form-control"
                                    placeholder="Enter the User Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_phone" style="font-weight: bold;">End User Phone Number : <span
                                        class="text-danger">*</span></label>
                                <input type="phone" name="user_phone" class="form-control"
                                    placeholder="Enter the User Phone Number" oninput="validatePhoneNumber(this)" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="user_company_name" style="font-weight: bold;">End User Company Full Name :
                                    <span class="text-danger">*</span></label>
                                <input type="text" name="user_company_name" class="form-control"
                                    placeholder="Enter the User Company Full Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="company_address" style="font-weight: bold;">End User Company Address
                                    :</label>
                                <input type="text" name="company_address" class="form-control"
                                    placeholder="Enter the User Company Address">
                            </div>
                            <div class="form-group mb-3">
                                <label for="company_industry" style="font-weight: bold;">End User Company Industry Type
                                    : <span class="text-danger">*</span></label>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry4" value="Agriculture">
                                    <label class="form-check-label" for="company_industry4">
                                        Agriculture
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry5" value="Education">
                                    <label class="form-check-label" for="company_industry5">
                                        Education
                                    </label>
                                </div>

                                <div class="form-check mb-1 mt-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry1" value="Financial Services">
                                    <label class="form-check-label" for="company_industry1">
                                        Financial Services
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry6" value="Food & Beverage">
                                    <label class="form-check-label" for="company_industry6">
                                        Food & Beverage
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry7" value="Logistics">
                                    <label class="form-check-label" for="company_industry7">
                                        Logistics
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry2" value="Manufacture">
                                    <label class="form-check-label" for="company_industry2">
                                        Manufacture
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry3" value="Retail">
                                    <label class="form-check-label" for="company_industry3">
                                        Retail
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="company_industry"
                                        id="company_industry8" value="Yang Lain">
                                    <label class="form-check-label" for="company_industry8">
                                        Others
                                    </label>
                                </div>

                                <div class="form-group mt-2" id="otherIndustryInput" style="display:none;">
                                    <label for="other_industry">Please Specify:<span class="text-danger">*</span></label>
                                    <input type="text" name="other_industry" class="form-control"
                                        placeholder="Enter the User Company Industry Type">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="deployment" style="font-weight: bold;">Deployment Type : <span
                                        class="text-danger">*</span></label>

                                <div class="form-check mb-1 mt-1">
                                    <input class="form-check-input" type="radio" name="deployment" id="deployment1"
                                        value="On Cloud">
                                    <label class="form-check-label" for="deployment1">
                                        On Cloud
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="deployment" id="deployment2"
                                        value="On Premise">
                                    <label class="form-check-label" for="deployment2">
                                        On Premise
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="radio" name="deployment" id="deployment3"
                                        value="Ask for both option">
                                    <label class="form-check-label" for="deployment3">
                                        Ask for both option
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="os_tipe" style="font-weight: bold;">OS type : <span
                                        class="text-danger">*</span></label>
                                <div class="form-check mb-1 mt-1">
                                    <input class="form-check-input" type="checkbox" name="os_type[]" id="os_type1"
                                        value="Android">
                                    <label class="form-check-label" for="os_type1">
                                        Android
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" name="os_type[]" id="os_type3"
                                        value="iOS">
                                    <label class="form-check-label" for="os_type3">
                                        iOS
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" name="os_type[]" id="os_type5"
                                        value="Linux">
                                    <label class="form-check-label" for="os_type5">
                                        Linux
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" name="os_type[]" id="os_type4"
                                        value="MacOS">
                                    <label class="form-check-label" for="os_type4">
                                        MacOS
                                    </label>
                                </div>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" name="os_type[]" id="os_type2"
                                        value="Windows">
                                    <label class="form-check-label" for="os_type2">
                                        Windows
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jumlah_lisensi" style="font-weight: bold;">Number of licenses : <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="jumlah_lisensi" class="form-control"
                                    placeholder="Enter the Number of licenses" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mdm_competitor" style="font-weight: bold;">Current Existing MDM /
                                    Competitor (if Any) : <span class="text-danger">*</span></label>
                                <input type="text" name="mdm_competitor" class="form-control"
                                    placeholder="Enter the Current Exisiting MDM / Competitor" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="poc_date" style="font-weight: bold;">Demo / POC Date (Target) : <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="poc_date" class="form-control"
                                    placeholder="Enter the Demo / POC Date" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="budget_license" style="font-weight: bold;">End User Budget per License per
                                    Year (in IDR) :</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" name="budget_license" id="input-harga" class="form-control"
                                        placeholder="Enter the User Budget Per License" oninput="formatCurrency(this);">
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-danger" onclick="location.reload()">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- untuk mengatur nominal rupiah-->
    {{-- <script>
        function formatCurrency(input) {
            // Menghapus semua karakter non-digit dari input
            var rawValue = input.value.replace(/\D/g, '');

            // Menggunakan fungsi Number() untuk mengonversi string menjadi nilai numerik
            var numericValue = Number(rawValue);

            // Memformat nilai numerik dengan menambahkan separator ribuan
            var formattedValue = new Intl.NumberFormat('id-ID').format(numericValue);

            // Mengganti nilai input dengan nilai yang telah diformat
            input.value = formattedValue;
        }
    </script> --}}


    <!-- untuk memunculkan inputan pada saat pilih lainnya di compeny industry -->
    <script>
        // JavaScript untuk menampilkan input lainnya ketika opsi "Other" dipilih
        var companyIndustryRadios = document.querySelectorAll('input[name="company_industry"]');
        var otherIndustryInput = document.getElementById('otherIndustryInput');

        companyIndustryRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (radio.value === 'Yang Lain') {
                    otherIndustryInput.style.display = 'block';
                } else {
                    otherIndustryInput.style.display = 'none';
                }
            });
        });
    </script>

    <!-- auto disable form pada saat sudah di simpan-->
    <script>
        document.getElementById('pendaftaranForm').addEventListener('submit', function() {
            document.getElementById('submitButton').setAttribute('disabled', 'true');
        });
    </script>

    <!-- untuk memunculkan alert dengan durasi 3 detik -->
    <script>
        // Hanya menampilkan alert selama 3 detik
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }

            var errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 3000);
    </script>

    <!-- Validasi no Phone -->
    <script>
        function validatePhoneNumber(input) {
            // Hapus karakter selain angka, (), dan karakter simbol lainnya
            input.value = input.value.replace(/[^0-9()\-+]/g, '');
        }
    </script>
@endsection
