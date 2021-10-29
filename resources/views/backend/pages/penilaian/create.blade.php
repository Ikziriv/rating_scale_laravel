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
                                            <form method="POST" action="{{route('penilaian.store')}}">
                                              @csrf
                                                <div class="form-group row">
                                                  <div class="col-sm-12">
                                                    <label for="inputEmail4">Nama Pegawai</label>
                                                    <select id="inputState" name="user_id" class="form-control form-control-sm">
                                                      <option selected disabled>Pilihan</option>
                                                      @forelse($user as $u)
                                                      <option value="{{$u->id}}">{{$u->username}}</option>
                                                      @empty
                                                      <option>...</option>
                                                      @endforelse
                                                    </select>
                                                  </div>
                                                </div>
                                              @forelse($indikators as $key => $v)
                                                <div class="form-group row">
                                                  <div class="col-sm-8">
                                                      <label for="staticEmail" class="col-form-label">{{$v->name}}</label>
                                                      <input type="hidden" name="bobot_{{$v->id}}" value="{{$v->bobot}}" readonly>
                                                      <input type="hidden" name="banding_{{$v->id}}" value="{{$v->nilai}}" readonly>
                                                  </div>
                                                  <div class="col-sm-4">
                                                      <input type="number" class="form-control form-control-sm" name="nilai_{{$v->id}}" placeholder="Nilai Input" required>
                                                  </div>
                                                </div>
                                              @empty
                                                Empty
                                              @endforelse
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
