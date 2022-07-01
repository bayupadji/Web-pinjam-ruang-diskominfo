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
                        @foreach ($ruang as $a)
                            @if ($a->status == 'tersedia')
                                <tr></tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->nama_ruang }}</td>
                                <td>{{ $a->lantai }}</td>
                                <td>{{ $a->kapasitas }}</td>
                                <td>{{ $a->status }}</td>
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
                        <th scope="col">Nama Ruang</th>
                        <th scope="col">Tanggal pinjam</th>
                        <th scope="col">Jam pinjam</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Status</th>
                    </thead>
                    @foreach ($transaksi as $ts)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ts->ruang->nama_ruang }}</td>
                                <td>{{ $ts->tanggal_pinjam }}</td>
                                <td>{{ $ts->jam_pinjam }}</td>
                                <td>{{ $ts->jam_berakhir }}</td>
                                @if ($ts->status == 'Belum terverifikasi')
                                    <td><span class="badge text-bg-danger">{{ $ts->status }}</span></td>
                                @else
                                    <td><span class="badge text-bg-success">{{ $ts->status }}</span></td>
                                @endif
                            </tr>
                        </tbody>
                    @endforeach
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
                    <form action="/home/store" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="tanggal_pinjam">
                            <label for="floatingInput">Pilih Tanggal</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="ruang_id">
                                <option selected>Silahkan pilih ruang</option>
                                @foreach ($ruang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_ruang }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Pilih Ruang</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="jammulai" aria-label="Floating label select example"
                                        onchange="hitung()" name="jam_pinjam">
                                        <option selected>Pilih Jam</option>
                                        @for ($i = 0; $i < count($available); $i++)
                                            <option value="{{ $available[$i][0] }}">{{ $available[$i][0] }}</option>
                                        @endfor
                                    </select>
                                    <label for="jammulai">Jam Dimulai</label>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="durasi" aria-label="Floating label select example"
                                        onchange="hitung()">
                                        <option selected value="">Pilih Durasi</option>
                                        <option value="1">1 Jam</option>
                                        <option value="2">2 Jam</option>
                                        <option value="3">3 Jam</option>
                                        <option value="4">4 Jam</option>
                                        <option value="5">5 Jam</option>
                                        <option value="6">6 Jam</option>
                                        <option value="7">7 Jam</option>
                                        <option value="8">8 Jam</option>
                                        <option value="9">9 Jam</option>
                                        <option value="10">10 Jam</option>
                                        <option value="11">11 Jam</option>
                                        <option value="12">12 Jam</option>
                                        <option value="13">13 Jam</option>
                                        <option value="14">14 Jam</option>
                                    </select>
                                    <label for="durasi">Durasi Pinjam</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" readonly class="form-control" id="jamakhir" name="jam_berakhir">
                            <label for="floatingTextarea2">Jam Akhir</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Tulis keterangan disini" id="floatingTextarea2" style="height: 100px"
                                name="keterangan"></textarea>
                            <label for="floatingTextarea2">Keterangan</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-1">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function hitung() {
            var waktu = document.getElementById('jammulai').value;
            var durasi = document.getElementById('durasi').value;
            // console.log(durasi);
            if (durasi == '') {
                document.getElementById('jamakhir').value = '00:00';
            } else {
                var time = waktu.split(":");
                var hourplus = parseInt(time[0]) + parseInt(durasi);
                document.getElementById('jamakhir').value = hourplus + ':00';
            }
            // console.log(new Date.parse(value));
        }
    </script>
@endpush
