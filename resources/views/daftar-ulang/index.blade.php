@extends('layouts.app')

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .card-header {
            background-color: #f4c542;
            /* Background yellow for card header */
        }

        .card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-user {
            font-weight: 600;
        }

        .spinner-border-sm {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>
@endpush

@section('content')
    {{-- @dd($groupedData) --}}
    <div class="d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-12 text-center">
                <img src="{{ asset('images/glora-logo.png') }}" alt="Glora Logo" width="250" height="250">
            </div>
            <div class="col-12">
                <div class="card mt-3 w-100" style="box-shadow: 5px 10px #2d3748">
                    <div class="card-header text-white">
                        <h3 class="card-title">
                            Pendaftaran <span class="d-none d-lg-inline">Gebyar Lomba Palang Merah Remaja</span>
                            <span class="d-inline d-lg-none fw-bold">GLORA</span>
                        </h3>
                    </div>
                    <form action="{{ route('daftar-ulang.store') }}" method="POST" enctype="multipart/form-data"
                        class="form-with-loading">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="namaSekolah" class="form-label">Nama Sekolah</label>
                                <input type="text" class="form-control" name="nama_sekolah" id="namaSekolah"
                                    placeholder="Masukkan Nama Sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label">Type Sekolah</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="Madya">Madya</option>
                                    <option value="Wira">Wira</option>
                                </select>
                            </div>

                            <!-- Jumlah Team Section -->
                            <div class="card mt-4">
                                <div class="card-header bg-danger">
                                    <h5 class="text-white">Jumlah Team</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach (['pp_putra' => 'Pertolongan Pertama Putra', 'pp_putri' => 'Pertolongan Pertama Putri', 'tandu_putra' => 'Tandu Darurat Putra', 'tandu_putri' => 'Tandu Darurat Putri', 'karikatur' => 'Karikatur (Poster)', 'du' => 'Dapur Kreasi', 'konselor' => 'PRS Konselor', 'kabaret' => 'PRS Kabaret'] as $key => $label)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="{{ $key }}"
                                                        class="form-label">{{ $label }}</label>
                                                    <input type="number" class="form-control"
                                                        name="categories[{{ $key }}]" id="{{ $key }}"
                                                        placeholder="Masukkan Jumlah Team" value="0" required>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-warning btn-user btn-block btn-loading">
                                    <span class="btn-text">Kirim</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header bg-success text-white">
            <h5>Data Pendaftaran yang Baru Dikirim</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>PP Putra Putri</th>
                        <th>Tandu Putra Putri</th>
                        <th>Karikatur</th>
                        <th>Dapur Umum</th>
                        <th>Konselor</th>
                        <th>Kabaret</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groupedData as $sekolah => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sekolah }}</td>
                            <td>{{ implode(', ', $data['PP Putra Putri']) }}</td>
                            <td>{{ implode(', ', $data['Tandu Putra Putri']) }}</td>
                            <td>{{ implode(', ', $data['Karikatur']) }}</td>
                            <td>{{ implode(', ', $data['Dapur Umum']) }}</td>
                            <td>{{ implode(', ', $data['Konselor']) }}</td>
                            <td>{{ implode(', ', $data['Kabaret']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
@endpush
