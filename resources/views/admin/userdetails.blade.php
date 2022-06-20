@extends('layouts.admin')

@section('title', 'User Details')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4 p-1">
                    <div class="card-body">
                        <table id="tables" class="table table-striped table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bidang</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nip }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->bidang }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="/edituser/{{ $user->id }}/edit"><i
                                                    class="bx bx-edit "></i></a>
                                            <a href="/userdetail/{{ $user->id }}/destroy" class="btn btn-danger"><i
                                                    class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    <form action="" method="POST" name="frm_edit" id="frm_edit">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nama"
                                placeholder="Nama Lengkap">
                            <label for="floatingInput">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
                            <label for="floatingInput">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nip" placeholder="NIP">
                            <label for="floatingInput">NIP</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('status') is-invalid @enderror"
                                        id="floatingSelectGrid" name="status">
                                        <option selected>Pilih Status</option>
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
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
        </div> --}}
    </div>

@endsection
