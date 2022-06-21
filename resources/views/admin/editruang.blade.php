@extends('layouts.admin')

@section('title', 'edit Ruang')
@section('content')
    <div class="container-fluid">
        <div class="card p-2">
            <div class="card-body">
                <form action="/editruang/{{ $ruang->id }}/update" method="POST" name="frm_edit"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" name="foto" accept="img/*"
                            value="{{ $ruang->foto }}">
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nama_ruang"
                            placeholder="Nama Ruang" value="{{ $ruang->nama_ruang }}">
                        <label for="floatingInput">Nama Ruang</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="kapasitas"
                            placeholder="Kapasitas" value="{{ $ruang->kapasitas }}">
                        <label for="floatingInput">Kapasitas</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="deskripsi"
                            placeholder="deskripsi" value="{{ $ruang->deskripsi }}">
                        <label for="floatingInput">Deskripsi</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select @error('lantai') is-invalid @enderror" id="floatingSelectGrid"
                                    name="lantai">
                                    <option selected value="{{ $ruang->lantai }}">{{ $ruang->lantai }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <label for="floatingSelectGrid">Lantai</label>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <select class="form-select  @error('status') is-invalid @enderror" name="status"
                                    id=" floatingSelectGrid">
                                    <option selected value="{{ $ruang->status }}">{{ $ruang->status }}</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tidak_tersedia">Tidak tersedia</option>
                                </select>
                                <label for="floatingSelectGrid">Status Ruangan</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
