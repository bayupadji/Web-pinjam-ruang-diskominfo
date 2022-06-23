@extends('layouts.app')
@section('title', 'Ruang')
@section('content')
    <div class="container-sm">
        <section class="header my-4">
            <h1 class="fw-bold">Daftar Ruang</h1>
        </section>
        <div class="row">
            @foreach ($rview as $ruang)
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('storage/images/' . $ruang->foto) }}" class="card-img-top" alt="{{ $ruang->foto }}"
                        width="260px">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $ruang->nama_ruang }}</h5>
                        <p class="card-text">Lantai {{ $ruang->lantai }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#detailruang"><i class='bx bxs-low-vision'></i> Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal  fade" id="detailruang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">{{ $ruang->nama_ruang }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('storage/images/' . $ruang->foto) }}" alt="{{ $ruang->foto }}"
                                width="200px">
                        </div>
                        <div class="col-6">
                            <p>Lantai : {{ $ruang->lantai }}</p>
                            <p>Kapasitas : {{ $ruang->kapasitas }}</p>
                            <p>Deskripsi : {{ $ruang->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
