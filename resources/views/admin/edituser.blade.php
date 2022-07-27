@extends('layouts.admin')

@section('title', 'Edit User')
@section('content')
    <div class="container-fluid">
        <div class="card w-75 p-4">

            <div class="card-body">

                <form action="/edituser/{{ $user->id }}/update" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nama" placeholder="Nama Lengkap"
                            value="{{ $user->name }}">
                        <label for="floatingInput">Nama Lengkap</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="email" placeholder="Email"
                            value="{{ $user->email }}">
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nip" placeholder="NIP"
                            value="{{ $user->nip }}" maxlength="18">
                        <label for="floatingInput">NIP</label>
                    </div>

                    @if (Auth::user()->is_admin == 1)
                        <div class="form-floating mb-3">
                            <select class="form-select @error('is_admin') is-invalid @enderror" id="role"
                                name="is_admin">
                                <option selected value="{{ $user->is_admin }}">
                                    @if ($user->is_admin == 2)
                                        Admin
                                    @elseif ($user->is_admin == 1)
                                        Super Admin
                                    @else
                                        User
                                    @endif
                                </option>
                                <option value="2">Admin</option>
                                <option value="">User</option>
                            </select>
                            <label for="floatingSelectGrid">Role</label>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select @error('status') is-invalid @enderror" id="floatingSelectGrid"
                                    name="status">
                                    <option selected value="{{ $user->status }}">{{ $user->status }}</option>
                                    <option value="pns">PNS</option>
                                    <option value="non_pns">NON PNS</option>
                                </select>
                                <label for="floatingSelectGrid">Status</label>
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select  @error('bidang') is-invalid @enderror" name="bidang"
                                    id=" floatingSelectGrid">
                                    <option selected value="{{ $user->bidang }}">{{ $user->bidang }}</option>
                                    <option value="umpeg">Umum dan Kepegawaian</option>
                                    <option value="egov">E-Goverment</option>
                                    <option value="program">Program</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="persadian">Persadian</option>
                                </select>
                                <label for="floatingSelectGrid">Bidang</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
            </form>

        </div>
    </div>
@endsection
