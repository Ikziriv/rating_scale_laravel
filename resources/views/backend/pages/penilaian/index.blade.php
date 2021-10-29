@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('backend.pages._partials.sidebar')
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                  <div class="clearfix">
                                      <div class="float-left">
                                          Menu <br> Penilaian
                                      </div>
                                      <div class="float-right">
                                          <a href="{{route('home')}}">Kembali</a>
                                      </div>
                                  </div><hr>
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="clearfix pb-3">
                                            <div class="float-left">
                                              <a class="btn btn-primary" href="{{route('penilaian.create')}}">Tambah Data</a>
                                            </div>
                                            <div class="float-right">
                                              <a class="btn btn-primary" href="{{route('penilaian.monthly')}}">Laporan</a>
                                            </div>
                                          </div>
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Peringkat</th>
                                                <th scope="col">Skala</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col"></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @forelse($penilaians as $key => $v)
                                              <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                @php
                                                $user = App\User::where('id', $v->user_id)->first();
                                                @endphp
                                                <td>{{date('d-m-Y', strtotime($v->created_at))}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$v->peringkat}}</td>
                                                <td>{{$v->skala}}</td>
                                                <td>{{$v->ket}}</td>
                                                <td>{{number_format($v->nilai, 2)}} %</td>
                                                <td class="text-right">
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('penilaian.show', $v->id) }}" class="btn btn-primary">Lihat</a>
                                                    <form id="delete-form-{{$v->id}}" 
                                                        method="post" 
                                                        action="{{route('penilaian.destroy', $v->id)}}"
                                                        style="display: none;">
                                                      {{csrf_field()}}
                                                      {{method_field('DELETE')}}
                                                    </form>
                                                    <a href="" class="btn btn-primary" onclick="
                                                        if(confirm('Are You Sure?')) {
                                                          event.preventDefault();
                                                          document.getElementById('delete-form-{{$v->id}}').submit();
                                                        } else {
                                                          event.preventDefault();
                                                        }
                                                      ">Hapus</a>
                                                  </div>
                                                </td>
                                              </tr>
                                              @empty
                                              <tr>
                                                <td>Empty</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                              </tr>
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
        </div>
    </div>
</div>
@endsection
