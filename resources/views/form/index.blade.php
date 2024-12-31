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
    </style>
@endpush

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <div class="card mt-3 w-100" style="box-shadow: 5px 10px #2d3748">
            <div class="card-header bg-warning">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title text-white">Pendaftaran <span class="d-none d-lg-inline">Gebyar Lomba Palang
                                Merah</span> <span class="d-inline d-lg-none fw-bold">GLORA</span></h3>
                    </div>
                    <div class="ml-auto"></div>
                </div>
            </div>
            <form action="{{ route('form.daftar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="namaSekolah" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" id="namaSekolah"
                            placeholder="Masukan Nama Sekolah" required>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header bg-danger">
                            <h5 class="text-white">Jumlah Team</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pertolonganPertama" class="form-label">Pertolongan Pertama</label>
                                <input type="number" class="form-control" name="pp" id="pertolonganPertama"
                                    placeholder="Masukan Jumlah Team" value="0" required>
                            </div>
                            <div class="form-group">
                                <label for="tandu" class="form-label">Tandu</label>
                                <input type="number" class="form-control" id="tandu" name="tandu"
                                    placeholder="Masukan Jumlah Team" value="0" required>
                            </div>
                            <div class="form-group">
                                <label for="karikatur" class="form-label">Karikatur</label>
                                <input type="number" class="form-control" id="karikatur" name="karikatur"
                                    placeholder="Masukan Jumlah Team" value="0" required>
                            </div>
                            <div class="form-group">
                                <label for="dapurUmum" class="form-label">Dapur Umum</label>
                                <input type="number" class="form-control" id="dapurUmum" name="du"
                                    placeholder="Masukan Jumlah Team" value="0" required>
                            </div>
                            <div class="form-group">
                                <label for="prsKonselor" class="form-label">PRS Konselor</label>
                                <input type="number" class="form-control" id="prsKonselor"
                                    placeholder="Masukan Jumlah Team" name="konselor" value="0" required>
                            </div>
                            <div class="form-group">
                                <label for="prsKabaret" class="form-label">PRS Kabaret</label>
                                <input type="number" class="form-control" id="prsKabaret" name="kabaret"
                                    placeholder="Masukan Jumlah Team" value="0" required>
                            </div>
                            <div class="form-group" id="hargaList">
                                <div class="row">
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                Pertolongan Pertama x <span id="pertolonganPertamaQty">0</span> = <span
                                                    id="pertolonganPertamaHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                Tandu Darurat x <span id="tanduQty">0</span> = <span id="tanduHarga">Rp.
                                                    0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                Karikatur (Poster) x <span id="karikaturQty">0</span> = <span
                                                    id="karikaturHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                Dapur Kreasi x <span id="dapurUmumQty">0</span> = <span
                                                    id="dapurUmumHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                PRS Konselor x <span id="prsKonselorQty">0</span> = <span
                                                    id="prsKonselorHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                PRS Kabaret x <span id="prsKabaretQty">0</span> = <span
                                                    id="prsKabaretHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                Total Harga = <span id="totalHarga">Rp. 0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" id="buktiPembayaran"
                            required>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-warning w-100">Daftar Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const prices = {
            pertolonganPertama: 45000,
            tandu: 45000,
            karikatur: 45000,
            dapurUmum: 50000,
            prsKonselor: 50000,
            prsKabaret: 50000
        };

        function updateHarga() {
            let totalHarga = 0;

            for (const key in prices) {
                const qty = parseInt(document.getElementById(key).value) || 0;
                const harga = qty * prices[key];

                document.getElementById(`${key}Qty`).innerText = qty;
                document.getElementById(`${key}Harga`).innerText = `Rp. ${harga.toLocaleString('id-ID')}`;

                totalHarga += harga;
            }

            document.getElementById("totalHarga").innerText = `Rp. ${totalHarga.toLocaleString('id-ID')}`;
        }

        document.querySelectorAll("input[type='number']").forEach(input => {
            input.addEventListener("input", updateHarga);
        });

        updateHarga();
    </script>
@endpush