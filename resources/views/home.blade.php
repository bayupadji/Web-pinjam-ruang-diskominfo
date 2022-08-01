@extends('layouts.app')

@section('title', 'Pinjam Ruang')

@section('content')

    <!-- HERO -->
    <div class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center" data-aos="zoom-in" data-aos-duration="1000">
                    <h1 class="display-4 fw-bold text-white">
                        E-Pinjam Ruang
                    </h1>
                    <p class="lead text-white">
                        Dinas Komunikasi dan Informatika Provinsi Jawa Tengah
                    </p>

                    <button type="button" class="btn buttonlgn px-3 m-2" data-bs-toggle="modal"
                        data-bs-target="#pinjamruang"><i class='bx bxs-door-open'></i>
                        Pinjam Sekarang
                    </button>

                    <a href="#kalender" class="btn buttonlgn px-3 m-2"><i class='bx bxs-calendar'></i>
                        Kalender
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{-- calendar --}}
    <section class="py-5">
        <div class="container-sm" data-aos="fade-up" data-aos-duration="3000ms">
            <div class="text-center py-5" id="kalender">
                <h1 class="fw-bold">Kalender</h1>
                <h5 class="fw-light">Peminjaman Ruang</h5>
            </div>

            <div id="calendar"></div>
        </div>
    </section>



    <!-- END HERO -->
@endsection

@push('script')
    {{-- calender --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pinjam = @json($event);
            // console.log(events);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                selectable: true,
                selectHelper: true,

                events: pinjam,
                eventColor: '#b71b22',
                eventDisplay: 'block',
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: true,
                },
            });

            calendar.render();

        });
    </script>
@endpush
