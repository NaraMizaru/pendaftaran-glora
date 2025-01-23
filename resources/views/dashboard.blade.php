@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
@endpush

@section('content')
    <div class="container">
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
                <div class="row">
                    <div class="col">
                        <h3 class="text-white">List Pendaftar</h3>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('dashboard.export', ['key' => env('DASHBOARD_KEY')]) }}"
                            class="btn btn-success">Download
                            Excel</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered nowrap w-100 mt-3" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Sekolah</th>
                            <th class="text-center">PP</th>
                            <th class="text-center">Tandu</th>
                            <th class="text-center">DU</th>
                            <th class="text-center">Karikatur</th>
                            <th class="text-center">PRS Konselor</th>
                            <th class="text-center">PRS Kabaret</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Bukti Transfer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($form as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->nama_sekolah }}</td>
                                <td class="text-center">{{ $item->pp }}</td>
                                <td class="text-center">{{ $item->tandu }}</td>
                                <td class="text-center">{{ $item->du }}</td>
                                <td class="text-center">{{ $item->karikatur }}</td>
                                <td class="text-center">{{ $item->konselor }}</td>
                                <td class="text-center">{{ $item->kabaret }}</td>
                                <td class="text-center">Rp. {{ number_format($item->total_harga, 0, '.', '.') }}</td>
                                <td class="text-center"><a type="button" onclick="previewImage(this.href);"
                                        href="{{ asset('storage/' . $item->bukti_pembayaran) }}"
                                        class="btn btn-success w-100" data-toggle="modal"
                                        data-target="#previewImageModal">Lihat</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="previewImageModal" tabindex="-1" role="dialog" aria-labelledby="previewImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewImageModalLabel">Preview Gambar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="" alt="Image Preview" class="img-fluid rounded-lg" loading="lazy">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">Tutup</button>
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
                scrollX: true,
                autoWidth: true,
            });
        });
    </script>
    <script>
        const previewImage = (src) => {
            const modal = document.getElementById('previewImageModal');
            const img = modal.querySelector('img');
            img.src = src;
        }
    </script>
@endpush
