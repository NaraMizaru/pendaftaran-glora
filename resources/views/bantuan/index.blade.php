@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
@endpush

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/glora-logo.png') }}" alt="" width="250" height="250">
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-warning">
            <h4 class="text-white">Data Dukungan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h4 class="text-white">Daftar Dukungan Yang Sudah Masuk</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered no-wrap-w-100 mt-3" id="table-1">
                                <thead class="bg-secondary">
                                    <tr class="text-white">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Dukungan</th>
                                        <th class="text-center">Angkatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Hilal</td>
                                        <td class="text-center">Uang</td>
                                        <td class="text-center">2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header bg-danger">
                            <h4 class="text-white">Form Dukungan</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="dukungan">Dukungan</label>
                                    <input type="text" class="form-control" id="dukungan" name="dukungan" required>
                                </div>
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input type="text" class="form-control" id="angkatan" name="angkatan" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning float-right mt-2">Kirim Dukungan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                responsive: true,
            });
        });
    </script>
@endpush
