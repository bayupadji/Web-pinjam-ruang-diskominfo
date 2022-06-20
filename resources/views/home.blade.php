@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div class="row my-3 gap-2">
            <div class="col-md justify-content-center ">
                <a class="btn btn-4 d-grid" href="#"> <i class='bx bxs-door-open bx-lg'></i>Ruang</a>
            </div>
            <div class="col-md justify-content-center">
                <a class=" btn btn-4 d-grid" href="#"> <i class='bx bxs-book-open bx-lg'></i>Pinjam Ruang</a>
            </div>
        </div>

        <section class="header mt-5">
            <h1 class="fw-bold">Ruang Tersedia</h1>
            <h5 id="date"></h5>
            <h5 id="clock"></h5>
        </section>

        <table class="table table-responsive table-striped table-hover">
            <thead class="table-dark">
                <th scope="col">No.</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama Ruang</th>
                <th scope="col">Lantai</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Status</th>
            </thead>
            <tbody>
                @foreach ($ruang as $ruang)
                    <tr>
                        <td>{{ $ruang->id }}</td>
                        <td>{{ $ruang->foto }}</td>
                        <td>{{ $ruang->nama_ruang }}</td>
                        <td>{{ $ruang->lantai }}</td>
                        <td>{{ $ruang->kapasitas }}</td>
                        <td>{{ $ruang->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
