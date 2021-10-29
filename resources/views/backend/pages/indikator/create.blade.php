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
                                          Menu <br> Tambah Indikator
                                      </div>
                                      <div class="float-right">
                                          <a href="{{route('indikator.index')}}">Kembali</a>
                                      </div>
                                  </div><hr>
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body">
                                            <form method="POST" action="{{route('indikator.store')}}">
                                              @csrf
                                                <div class="form-row">
                                                  <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Variable</label>
                                                    <select id="inputState" name="variable_id" class="form-control form-control-sm">
                                                      <option selected disabled>Pilihan</option>
                                                      @forelse($variable as $v)
                                                      <option value="{{$v->id}}">{{$v->name}}</option>
                                                      @empty
                                                      <option>...</option>
                                                      @endforelse
                                                    </select>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Nama</label>
                                                    <input type="text" name="name" class="form-control form-control-sm">
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputAddress">Bobot %</label>
                                                  <input type="text" name="bobot" class="form-control form-control-sm">
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputAddress2">Nilai</label>
                                                  <input type="text" name="nilai" class="form-control form-control-sm">
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
