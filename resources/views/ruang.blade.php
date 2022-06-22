@extends('layouts.app')
@section('title', 'Ruang')
@section('content')
    <div class="container-sm">
        <section class="header my-3">
            <h1>Daftar Ruang</h1>
        </section>
        <div class="row">
            @foreach ($rview as $ruang)
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('storage/images/' . $ruang->foto) }}" class="card-img-top"
                        alt="{{ $ruang->foto }}}">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $ruang->nama_ruang }}</h5>
                        <p class="card-text">Lantai {{ $ruang->lantai }}</p>
                        <a href="#" class="btn btn-primary"><i class='bx bxs-low-vision'></i> Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
