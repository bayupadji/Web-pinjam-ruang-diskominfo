@extends('layouts.admin')

@section('title', 'User Details')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-2 p-1">
                    <div class="card-body">
                        <table id="tables-user"
                            class="table border table-striped table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Bidang</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
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
                                        <td>
                                            @if ($user->is_admin == '2')
                                                Admin
                                            @elseif ($user->is_admin == '1')
                                                Super Admin
                                            @else
                                                User
                                            @endif
                                        </td>
                                        </td>
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

    @push('script')
        <script>
            $(document).ready(function() {
                $('#tables-user').DataTable({

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excel',
                            title: 'User Data',
                            exportOptions: {
                                stripHtml: false,
                                columns: [0, 1, 2, 3, 4, 5, 6]
                                //specify which column you want to print

                            }
                        },
                        {
                            extend: 'pdf',
                            title: 'User Data',
                            exportOptions: {
                                stripHtml: false,
                                columns: [0, 1, 2, 3, 4, 5, 6]
                                //specify which column you want to print

                            }
                        },
                        {
                            extend: 'print',
                            title: 'User Data',
                            exportOptions: {
                                stripHtml: false,
                                columns: [0, 1, 2, 3, 4, 5, 6]
                                //specify which column you want to print

                            }
                        },

                    ]
                });
            });
        </script>
    @endpush

@endsection
