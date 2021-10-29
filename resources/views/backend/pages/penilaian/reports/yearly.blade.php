@extends('layouts.app')

@section('style')
{{-- <script src="{{asset('css/vendor/morris.css')}}"></script> --}}
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('backend.pages._partials.sidebar')
                        <div class="col-9">

                        <form method="GET" action="{{route('penilaian.yearly')}}" accept-charset="UTF-8" class="form-inline mt-3">
                            <table>
                                <tr>
                                    <td align="left"><label for="month" class="control-label text-left">Lihat Tahunan / </label></td>
                                    <td align="right">
                                        <select class="form-control form-control-sm" id="user_id" name="user_id">
                                        <option selected disabled>Pilihan</option>
                                        @foreach($users as $key => $u)
                                        <option value="{{$u->id}}">{{$u->username}}</option>
                                        @endforeach
                                        </select>
                                        <select class="form-control form-control-sm" id="year" name="year">
                                        @foreach($years as $y)
                                        <option value="{{$y}}">{{$y}}</option>
                                        @endforeach
                                        </select>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <input class="btn btn-info btn-sm" type="submit" value="Lihat Laporan">
                                            <a href="{{route('penilaian.yearly')}}" class="btn btn-default btn-sm">Tahun Ini</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <div class="card card-primary">
                            <div class="card-body">
                                <h6 class="card-title text-right">Grafik Penilaian Tahun {{ $year }}</h6>
                                <strong>Nilai</strong>
                                <div id="yearly-chart" style="height: 250px;"></div>
                                <div class="text-right mr-4"><strong><small>Bulan</small></strong></div>
                            </div>
                        </div>

                        <div class="card card-success table-responsive">
                            <div class="card-heading"><h6 class="card-title ml-4">Detail Laporan</h6></div>
                            <div class="card-body table-responsive">
                                <table class="table-sm table datatable">
                                    <thead>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Jumlah Pegawai</th>
                                        <th class="text-right">Nilai</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @php $chartData = []; @endphp
                                        @foreach(getMonths() as $monthNumber => $monthName)
                                        @php
                                            $any = isset($reports[$monthNumber]);
                                            $total = $any ? $reports[$monthNumber]->total : 0
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ monthId($monthNumber) }}</td>
                                            <td class="text-center">{{ $any ? $reports[$monthNumber]->count : 0 }}</td>
                                            <td class="text-right">{{number_format($total, 2)}} %</td>
                                            <td class="text-center">
                                                <a href="{{route('penilaian.monthly', ['month' => $monthNumber, 'year' => $year])}}" class="btn btn-default btn-sm">Lihat Bulanan</a>
                                            </td>
                                        </tr>
                                        @php
                                            $chartData[] = ['month' => monthId($monthNumber), 'value' => $total];
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="{{asset('js/vendor/raphael.min.js')}}"></script>
<script src="{{asset('js/vendor/morris.min.js')}}"></script>
<script>
(function() {
    new Morris.Line({
        element: 'yearly-chart',
        data: {!! collect($chartData)->toJson() !!},
        xkey: 'month',
        ykeys: ['value'],
        labels: ["{{ __('Pembelian') }} Rp"],
        parseTime:false,
        goals: [0],
        goalLineColors : ['red'],
        smooth: true,
        lineWidth: 2,
    });
})();
</script>
@endsection