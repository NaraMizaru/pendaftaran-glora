@extends('layouts.export')

@section('table')
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>PP</th>
                <th>Tandu</th>
                <th>DU</th>
                <th>Karikatur</th>
                <th>PRS Konselor</th>
                <th>PRS Kabaret</th>
                <th>Total Harga</th>
                <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($form as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_sekolah }}</td>
                    <td>{{ $item->pp }}</td>
                    <td>{{ $item->tandu }}</td>
                    <td>{{ $item->du }}</td>
                    <td>{{ $item->karikatur }}</td>
                    <td>{{ $item->konselor }}</td>
                    <td>{{ $item->kabaret }}</td>
                    <td>Rp. {{ number_format($item->total_harga, 0, '.', '.') }}</td>
                    <td><a
                            href="{{ asset('storage/' . $item->bukti_pembayaran) }}">{{ asset('storage/' . $item->bukti_pembayaran) }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
