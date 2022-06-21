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
@endsection
