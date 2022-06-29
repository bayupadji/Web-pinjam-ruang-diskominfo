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
                                <th scope="col">Nama user</th>
                                <th scope="col">Nama Ruang</th>
                                <th scope="col">Tanggal pinjam</th>
                                <th scope="col">Jam Pinjam</th>
                                <th scope="col">Jam Berakhir</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            @foreach ($transaksi as $transaksi)
                                <tbody>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->id }}</td>
                                    @if ($transaksi->user_id != null)
                                        <td>{{ $transaksi->user->name }}</td>
                                    @endif
                                    @foreach ($ruang as $r)
                                        <td>{{ $r->nama_ruang }}</td>
                                    @endforeach
                                    <td>{{ $transaksi->tanggal_pinjam }}</td>
                                    <td>{{ $transaksi->jam_pinjam }}</td>
                                    <td>{{ $transaksi->jam_berakhir }}</td>
                                    <td>{{ $transaksi->keterangan }}</td>
                                    @if ($transaksi->status == 'Belum terverifikasi')
                                        <td><span class="badge text-bg-danger">{{ $transaksi->status }}</span></td>
                                    @else
                                        <td><span class="badge text-bg-success">{{ $transaksi->status }}</span></td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Verifikasi
                                        </button>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/transaksi/{{ $transaksi->id }}/update" method="post">
                        @csrf
                        <p>Apakah data ingin diverifikasi?</p>
                        <input type="hidden" name="status" value="Sudah Terverifikasi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-1" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-2">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
