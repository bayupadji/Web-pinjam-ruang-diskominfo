@extends('layouts.admin')

@section('title', 'Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4 p-1">
                    <div class="card-body">
                        <table class="table table-responsive table-striped table-hover" id="tables-transaksi">
                            <thead>
                                <th scope="col">No.</th>
                                <th scope="col">id</th>
                                <th scope="col">Nama user</th>
                                <th scope="col">Nama Ruang</th>
                                <th scope="col">Tanggal pinjam</th>
                                <th scope="col">Tanggal selesai</th>
                                <th scope="col">Jam Pinjam</th>
                                <th scope="col">Jam Berakhir</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaksi->id }}</td>
                                        <td>{{ $transaksi->user->name }}</td>
                                        <td>{{ $transaksi->ruang->nama_ruang }}</td>
                                        <td>{{ $transaksi->tanggal_pinjam }}</td>
                                        <td>{{ $transaksi->tanggal_selesai }}</td>
                                        <td>{{ $transaksi->jam_pinjam }}</td>
                                        <td>{{ $transaksi->jam_berakhir }}</td>
                                        <td>{{ $transaksi->keterangan }}</td>
                                        @if ($transaksi->status == 'Belum terverifikasi')
                                            <td><span class="badge text-bg-danger">{{ $transaksi->status }}</span></td>
                                        @else
                                            <td><span class="badge text-bg-success">{{ $transaksi->status }}</span>
                                            </td>
                                        @endif
                                        @if ($transaksi->status == 'Belum terverifikasi')
                                            <td>
                                                <button type="button" class="btn btn-outline-success"
                                                    data-bs-toggle="modal" data-bs-target="#verifikasi"
                                                    data-bs-id="{{ $transaksi->id }}">
                                                    Verifikasi
                                                </button>
                                            </td>
                                        @else
                                            <td>
                                                <button type="button" class="btn btn-outline-success" disabled>
                                                    Verifikasi
                                                </button>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi data peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksi.update') }}" method="post">
                        @csrf
                        <p>Apakah data ingin diverifikasi?</p>
                        <input type="hidden" name="id" id="idverif">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-1" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-2">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        var verifikasi = document.getElementById('verifikasi')
        verifikasi.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.

            var idField = verifikasi.querySelector('.modal-body #idverif')

            idField.value = id
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#tables-transaksi').DataTable({

                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        title: 'Transaksi Data',
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            //specify which column you want to print

                        }
                    },
                    {
                        extend: 'pdf',
                        title: 'Transaksi Data',
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            //specify which column you want to print

                        }
                    },
                    {
                        extend: 'print',
                        title: 'Transaksi Data',
                        exportOptions: {
                            stripHtml: false,
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            //specify which column you want to print

                        }
                    },

                ]
            });
        });
    </script>
@endpush
