@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <div class="container py-5">
        <section class="py-4">
            <h1 class="fw-bold">Daftar Peminjaman</h1>
        </section>
        <div class="table">
            <table class="table table-striped table-bordered table-hover" id="tables-home">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Ruang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jam Pinjam</th>
                        <th>Jam Selesai</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->ruang->nama_ruang }}</td>
                            <td>{{ $p->tanggal_pinjam }}</td>
                            <td>{{ $p->jam_pinjam }}</td>
                            <td>{{ $p->jam_berakhir }}</td>
                            <td>{{ $p->keterangan }}</td>
                            @if ($p->status == 'Belum terverifikasi')
                                <td><span class="badge text-bg-danger">{{ $p->status }}</span></td>
                            @else
                                <td><span class="badge text-bg-success">{{ $p->status }}</span>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
