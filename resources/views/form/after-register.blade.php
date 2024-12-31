@extends('layouts.app')

@push('css')
@endpush

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center">
                    {{-- <img src="https://pmrwira.smkn2smi.sch.id/img/pmr.png" alt="" width="120" height="150"> --}}
                    <img src="{{ asset('images/glora-logo.png') }}" alt="" width="250" height="250">
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3 w-100" style="box-shadow: 5px 10px #2d3748">
                    <div class="card-header bg-warning">
                        <div class="row">
                            <h3 class="text-white">Terima Kasih</h3>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p>Terima kasih telah mendaftar di Glora. Silahkan masuk group whatsapp di link berikut</p>
                        <a href="https://chat.whatsapp.com/FiY3nJR1EhRBppB61pZikl" class="btn btn-warning"
                            target="_blank">Masuk Group</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
