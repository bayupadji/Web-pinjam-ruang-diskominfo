<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    <link href="app.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- calender --}}
    <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>


    <title>@yield('title')</title>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg sticky-top p-3">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logokominfoputih.png') }}" width="200px" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ruang') }}">Ruang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="" data-bs-toggle="modal"
                                data-bs-target="#pinjamruang">Pinjam</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('daftarpinjam') }}">Daftar Peminjaman</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <button class="btn buttonlgn ms-lg-3 px-4"
                                        onClick="window.location.href='{{ route('login') }}'">Login
                                    </button>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->is_admin == '1' || Auth::user()->is_admin == '2')
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endif

                            @if (Auth::check())
                                <li class="nav-item ">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn buttonlgn ms-lg-3 px-4" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>


        {{-- content --}}
        <main>
            @yield('content')
        </main>

        {{-- footer --}}
        <footer class="footer bg-dark text-white p-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="text-center text-white">
                            <strong>Copyright &copy; 2022</strong>
                            <i>Created by Diskominfo JATENG</i>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

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
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="ruang_id">
                                    <option selected>Silahkan pilih ruang</option>
                                    @foreach ($ruang as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_ruang }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Pilih Ruang*</label>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput tgl_mulai "
                                            name="tanggal_pinjam">
                                        <label for="floatingInput">Pilih Tanggal Mulai*</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput tgl_selesai"
                                            name="tanggal_selesai">
                                        <label for="floatingInput">Pilih Tanggal Selesai*</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" id="timestart" name="jam_pinjam">
                                        <label for="floatingTextarea2">Jam Mulai*</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="time" class="form-control" id="timeend"
                                            name="jam_berakhir">
                                        <label for="floatingTextarea2">Jam Selesai*</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Tulis keterangan disini" id="floatingTextarea2" style="height: 100px"
                                    name="keterangan"></textarea>
                                <label for="floatingTextarea2">Keterangan*</label>
                            </div>

                            <label class="fw-light py-3">(*) Wajib diisi</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-1">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    {{-- js bootstrap --}}
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="fullcalendar/lib/main.js"></script>

    {{-- AOS --}}
    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>

    {{-- datatable --}}
    <script>
        $(document).ready(function() {
            $('#tables-1').DataTable({
                responsive: true,
                select: true,
                searching: false,
            });
        });

        $(document).ready(function() {
            $('#tables-home').DataTable({
                responsive: true,
                select: true,

            });
        });
    </script>


    @stack('script')
</body>

</html>
