@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container-sm py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 p-3">
                <div class="card p-5 shadow-lg p-3 mb-5 bg-body rounded-5">
                    <div class="card-body">
                        <h1 class="text-center fw-bold pb-3">REGISTER</h1>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="floatingInput" name="name" placeholder="Nama" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                <label for="floatingInput">Nama Lengkap</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="row  g-3">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-select  @error('bidang') is-invalid @enderror" name="bidang"
                                            id=" floatingSelectGrid">
                                            <option selected>Pilih Bidang</option>
                                            <option value="umpeg">Umum dan Kepegawaian</option>
                                            <option value="egov">E-Goverment</option>
                                            <option value="program">Program</option>
                                            <option value="keuangan">Keuangan</option>
                                            <option value="persadian">Persadian</option>
                                        </select>
                                        <label for="floatingSelectGrid">Bidang</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('status') is-invalid @enderror" id="pns"
                                            name="status">
                                            <option selected>Pilih Status</option>
                                            <option value="pns">PNS</option>
                                            <option value="non_pns">NON PNS</option>
                                        </select>
                                        <label for="floatingSelectGrid">Status</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" placeholder="nip" value="{{ old('nip') }}" autocomplete="nip"
                                    maxlength="18" autofocus>
                                <label for="floatingInput">NIP</label>

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" name="email" placeholder="Email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>
                                <label for="floatingInput">Email address</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password">
                                <label for="floatingPassword">Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Password">
                                <label for="floatingPassword">Konfirmasi Password</label>
                            </div>

                            <div class="row justify-content-center pt-3">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-1">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script>
            $("#pns").change(function() {
                if ($(this).val() == "non_pns") {
                    $("#nip").attr("readonly", "readonly");
                } else {
                    $("#nip").removeAttr("readonly");
                }
            }).trigger("change");
        </script>
    @endpush
