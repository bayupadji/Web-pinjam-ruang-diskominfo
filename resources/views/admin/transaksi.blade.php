@extends('layouts.admin')

@section('title', 'Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4 p-1">
                    <div class="card-body">

                        <table class="table table-responsive table-striped table-hover" id="tables">
                            <thead>
                                <th scope="col">No.</th>
                                <th scope="col">id</th>
                                <th scope="col">Id Ruang</th>
                                <th scope="col">Id user</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal pinjam</th>
                                <th scope="col">Jam Pinjam</th>
                                <th scope="col">Jam Berakhir</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $transaksi)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->ruang_id }}</td>
                                    <td>{{ $transaksi->user_id }}</td>
                                    <td>{{ $transaksi->keterangan }}</td>
                                    <td>{{ $transaksi->tanggal_pinjam }}</td>
                                    <td>{{ $transaksi->jam_pinjam }}</td>
                                    <td>{{ $transaksi->jam_berakhir }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning"><i class="bx bx-edit"></i></a>
                                        <a href="/transaksi/{{ $transaksi->id }}/destroy" class="btn btn-danger"><i
                                                class="bx bx-trash"></i></a>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
