@extends('layouts.app')

@section('title', 'Pinjam Ruang')

@section('content')
    <div class="container-sm">
        <div class="row my-3 gap-2">
            <div class="col justify-content-center ">
                <a class="btn btn-4 d-grid" href="{{ route('ruang') }}"> <i class='bx bxs-door-open bx-lg'></i>Ruang</a>
            </div>
            <div class="col d-grid">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-4 d-grid" data-bs-toggle="modal" data-bs-target="#pinjamruang"><i
                        class='bx bxs-book-open bx-lg'></i>
                    Pinjam Ruang
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <section class="header mt-5">
                    <h1 class="fw-bold">Ruang Tersedia</h1>
                    <h5 id="date"></h5>
                    <h5 id="clock"></h5>
                </section>
            </div>
            <div class="col">
                <section class="header mt-5">
                    <h1 class="fw-bold">Daftar Peminjaman Anda</h1>
                    <h5>Total : {{ $counttran }} Peminjaman</h5>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table id="tables-1">
                    <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Ruang</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Status</th>
                    </thead>
                    <tbody>
                        @foreach ($ruang as $ruang)
                            @if ($ruang->status == 'tersedia')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ruang->nama_ruang }}</td>
                                    <td>{{ $ruang->lantai }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td>{{ $ruang->status }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col">
                <table id="tables-home">
                    <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Ruang</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Status</th>
                    </thead>
                    <tbody>
                        {{-- @foreach ($ruang as $ruang)
                            @if ($ruang->status == 'tersedia')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ruang->nama_ruang }}</td>
                                    <td>{{ $ruang->lantai }}</td>
                                    <td>{{ $ruang->kapasitas }}</td>
                                    <td>{{ $ruang->status }}</td>
                                </tr>
                            @endif
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pinjamruang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Pinjam Ruang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInput">
                        <label for="floatingInput">Pilih Tanggal</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <label for="floatingSelect">Pilih Ruang</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput">
                                <label for="floatingInput">Pilih Jam Dimulai</label>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput">
                                <label for="floatingInput">Pilih Jam Berakhir</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Tulis keterangan disini" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Keterangan</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-1">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
