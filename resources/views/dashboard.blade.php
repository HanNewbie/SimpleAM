@extends('admin.layouts')

@section('main-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Dashboard</h3>
        <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center gap-2">
            <label for="segmen" class="form-label mb-0">Filter Segmen:</label>
            <select name="segmen" id="segmen" class="form-select form-select-sm w-auto">
                <option value="">Semua</option>
                @foreach ($segmenList as $segmen)
                    <option value="{{ $segmen->NamaSegmen }}" {{ request('segmen') == $segmen->NamaSegmen ? 'selected' : '' }}>
                        {{ $segmen->NamaSegmen }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>       
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>SEGMEN</th>
                        <th>Nama AM</th>
                        <th>Nama Customer</th>
                        <th>Nama PIC</th>
                        <th>No HP PIC</th>
                        <th>SID</th>
                        <th>NO Billing</th>
                        <th>Layanan</th>
                        <th>Nilai Layanan</th>
                        <th>Habis Masa Kontrak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $dt)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dt->NamaSegmen}}</td>
                            <td>{{$dt->NamaAM}}</td>
                            <td>{{$dt->NamaCust	}}</td>
                            <td>{{$dt->NamaPIC}}</td>
                            <td>{{$dt->NoHPPIC}}</td>
                            <td>{{$dt->SID}}</td>
                            <td>{{$dt->NoBilling}}</td>
                            <td>{{$dt->ProdName}}</td>
                            <td>{{number_format($dt->NilaiLayanan, 0, ',', '.')}}</td>  
                            <td>{{$dt->EndDate}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>

                <style>
                    .table-bordered tbody tr:nth-child(odd) {
                        background-color: #f3f3f3; /* Warna abu muda */
                    }
                
                    .table-bordered tbody tr:nth-child(even) {
                        background-color: #ffffff; /* Warna putih */
                    }
                </style>

            </table>
        </div>
    </div>
</div>
@endsection
