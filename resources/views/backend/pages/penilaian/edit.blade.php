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
                                          Menu <br> Tambah Penilaian
                                      </div>
                                      <div class="float-right">
                                          <a href="{{route('penilaian.index')}}">Kembali</a>
                                      </div>
                                  </div><hr>
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body">
                                            <form method="POST" action="{{route('penilaian.update', [$penilaian->id])}}">
                                              @csrf
                                              @method('PUT')
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" class="form-control" name="nama" value="{{ old('nama', isset($penilaian) ? $penilaian->nama : '') }}">
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai</label>
                                                <input type="text" class="form-control" name="nilai" value="{{ old('nilai', isset($penilaian) ? $penilaian->nilai : '') }}">
                                              </div>
                                              <hr class="pt-3">
                                              <button type="submit" class="btn btn-sm btn-block btn-primary">Submit</button>
                                            </form>
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
    </div>
</div>
@endsection
