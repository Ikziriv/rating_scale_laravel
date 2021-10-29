@extends('layouts.app')

@section('style')
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
                        @php $dt = Carbon\Carbon::parse($date); @endphp

                        <form method="GET" action="{{route('penilaian.daily')}}" accept-charset="UTF-8" class="form-inline mt-3">
                            <table>
                                <tr>
                                    <td align="left"><label for="month" class="control-label text-left">Lihat Harian </label></td>
                                    <td align="right">
                                        <select class="form-control form-control-sm" id="user_id" name="user_id">
                                        <option selected disabled>Pilihan</option>
                                        @foreach($users as $key => $u)
                                        <option value="{{$u->id}}">{{$u->username}}</option>
                                        @endforeach
                                        </select>
                                        <input required="true" class="form-control form-control-sm dp" style="width:100px" name="date" type="text" value="{{$date}}" id="date">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <input class="btn btn-info btn-sm" type="submit" value="Lihat Laporan">
                                            <a href="{{route('penilaian.daily')}}" class="btn btn-default btn-sm">Hari Ini</a>
                                            <a href="{{route('penilaian.monthly', ['month' => monthNumber($dt->month), 'year' => $dt->year])}}" class="btn btn-default btn-sm">Lihat Bulanan</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <div class="card card-default table-responsive">
                            <table class="table-sm table datatable">
                                <thead>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Skala</th>
                                    <th class="text-center">Penilaian</th>
                                    <th class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @forelse($penilaian as $key => $v)
                                    <tr>
                                        <td class="text-center">{{ 1 + $key }}</td>
                                        @php
                                        $pegawai = App\Pegawai::where('user_id', $v->user_id)->first();
                                        @endphp
                                        <td class="text-center">{{ $pegawai->name }}</td>
                                        <td class="text-center">{{ dateId($v->created_at->format('Y-m-d')) }}</td>
                                        <td class="text-center">{{ $v->skala }}</td>
                                        <td class="text-center">{{number_format($v->nilai, 2)}} %</td>
                                        <td class="text-center">
                                            <a href="{{route('user.show', [$v->user_id])}}" title="Lihat detail " target="_blank" class="btn btn-info btn-xs">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="4">Data tidak ditemukan</td></tr>
                                    @endforelse
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
@endsection

@section('javascript')
<script type="text/javascript">
    $(function()
    {
        $(".dp").datepicker({
            dateFormat : "yy-mm-dd",
            showAnim : "fold"
        });
    });
</script>
@endsection
