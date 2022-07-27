@extends('layouts.app')
@section('title', 'Ruang')
@section('content')
    <div class="container-sm py-5">
        <section class="py-4">
            <h1 class="fw-bold">Daftar Ruang</h1>
        </section>

        @foreach ($ruang as $a)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        @if ($a->foto == null)
                            <img src="{{ asset('images/default.jpg') }}" class="img-fluid rounded-start">
                        @endif
                        <img src="{{ asset('storage/images/' . $a->foto) }}" class="img-fluid rounded-start"
                            alt="{{ $a->foto }}">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $a->nama_ruang }}</h5>
                            <p class="card-text">Lantai :{{ $a->lantai }}</p>
                            <p class="card-text">Kapasitas : {{ $a->kapasitas }}</p>
                            <p class="card-text">Deskripsi : {{ $a->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
