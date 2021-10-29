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

                        <form method="GET" action="{{route('penilaian.monthly')}}" accept-charset="UTF-8" class="form-inline mt-3">
                            <table>
                                <tr>
                                    <td align="left"><label for="month" class="control-label text-left">Lihat Bulanan / </label></td>
                                    <td align="right">
                                        <select class="form-control form-control-sm" id="user_id" name="user_id">
                                        <option selected disabled>Pilihan</option>
                                        @foreach($users as $key => $u)
                                        <option value="{{$u->id}}">{{$u->username}}</option>
                                        @endforeach
                                        </select>
                                        <select class="form-control form-control-sm" id="month" name="month">
                                        @foreach($months as $key => $m)
                                        <option value="{{$key}}">{{$m}}</option>
                                        @endforeach
                                        </select>
{{--                                         <select class="form-control form-control-sm" id="year" name="year">
                                        @foreach($years as $y)
                                        <option value="{{$y}}">{{$y}}</option>
                                        @endforeach
                                        </select> --}}
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <input class="btn btn-info btn-sm" type="submit" value="Lihat Laporan">
                                            <a href="{{route('penilaian.monthly')}}" class="btn btn-default btn-sm">Bulan Ini</a>
                                            <a href="{{route('penilaian.yearly', ['year' => $year])}}" class="btn btn-default btn-sm">Lihat Tahunan</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <div class="card card-primary">
                            <div class="card-body">
                                <h6 class="card-title text-right">Grafik Penilaian Bulan {{ $months[$month] }}</h6>
                                <strong>Nilai</strong>
                                <div id="monthly-chart" style="height: 250px;"></div>
                                <div class="text-right mr-4"><strong><small>Tanggal</small></strong></div>
                            </div>
                        </div>

                        <div class="card card-success table-responsive">
                            <div class="card-heading"><h6 class="card-title ml-4">Detail Laporan</h6></div>
                            <div class="card-body">
                                <table class="table-sm table datatable">
                                    <thead>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-right">Pegawai</th>
                                        <th class="text-center">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @php $chartData = []; @endphp
                                        @foreach(monthDateArray($year, $month) as $dateNumber)
                                        @php
                                            $any = isset($reports[$dateNumber]);
                                            $id = $any ? $reports[$dateNumber]->id_user : 0;
                                            $nilai = $any ? $reports[$dateNumber]->nilai_pg : 0;
                                        @endphp
                                        @if ($any)
                                            <tr>
                                                <td class="text-center">{{ dateId($date = $year.'-'.$month.'-'.$dateNumber) }}</td>
                                                @php
                                                $pegawai = App\Pegawai::where('user_id', $id)->first();
                                                @endphp
                                                <td class="text-center">{{ $pegawai->name }}</td>
                                                <td class="text-right">{{number_format($nilai, 2)}} %</td>
                                                <td class="text-center">
                                                    <a href="{{route('penilaian.daily', ['date' => $date])}}" class="btn btn-info btn-xs" title="Laponan Harian: 03 Mei 2019">Lihat Harian</a>
                                                </td>
                                            </tr>
                                        @endif
                                        @php
                                            $chartData[] = ['date' => $dateNumber, 'value' => ($nilai) ];
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
        element: 'monthly-chart',
        data: {!! collect($chartData)->toJson() !!},
        xkey: 'date',
        ykeys: ['value'],
        labels: ["{{ __('Penilaian') }}"],
        parseTime:false,
        xLabelAngle: 30,
        goals: [0],
        goalLineColors : ['red'],
        lineWidth: 2,
    });
})();
</script>
@endsection
