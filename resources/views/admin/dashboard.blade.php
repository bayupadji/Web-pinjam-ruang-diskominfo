@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row mx-auto g-3 my-auto">
            <div class="col-sm-3 my-auto">
                {{-- user --}}
                <div class="card rounded-2 p-3 bg-info text-white" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <span>User</span>
                        <h5 class="card-title ">{{ $ucount }} User</h5>
                        <a href="{{ route('userdetail') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-auto">
                {{-- trnsaksi --}}
                <div class="card rounded-2 p-3 bg-danger text-white" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <span>Ruang</span>
                        <h5 class="card-title">{{ $ruangcount }} Ruang</h5>
                        <a href="{{ route('ruangdetail') }}" class="  stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 my-auto">
                {{-- ruang --}}
                <div class="card rounded-2 p-3 bg-success text-white" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <span>Transaksi</span>
                        <h5 class="card-title">{{ $transaksicount }} Transaksi</h5>
                        <a href="{{ route('transaksi') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="card my-5 rounded-2">
            <div class="card-body">
                <h3 class="title py-2">Transaksi terakhir</h3>

                <table class="table table-responsive table-striped table-hover" id="tables-dashboard">
                    <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama ruang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal pinjam</th>
                        <th scope="col">Jam Pinjam</th>
                        <th scope="col">Jam Berakhir</th>
                        <th scope="col">Status</th>

                    </thead>
                    <tbody>
                        @foreach ($transaksi as $tc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tc->user->name }}</td>
                                <td>{{ $tc->ruang->nama_ruang }}</td>
                                <td>{{ $tc->keterangan }}</td>
                                <td>{{ $tc->tanggal_pinjam }}</td>
                                <td>{{ $tc->jam_pinjam }}</td>
                                <td>{{ $tc->jam_berakhir }}</td>
                                @if ($tc->status == 'Belum terverifikasi')
                                    <td><span class="badge text-bg-danger">{{ $tc->status }}</span></td>
                                @else
                                    <td><span class="badge text-bg-success">{{ $tc->status }}</span></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('#tables-dashboard').DataTable();

            });
        </script>
    @endpush
@endsection
