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
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <small class="float-right">You are logged in!</small>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                                      
                                      <div class="card-body">
                                        <h5 class="card-title">Pegawai</h5>
                                        <hr>
                                        <h3 class="card-text text-right">{{$pegawai}}</h3>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                                      
                                      <div class="card-body">
                                        <h5 class="card-title">Indikator</h5>
                                        <hr>
                                        <h3 class="card-text text-right">{{$indikator}}</h3>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card border-primary mb-3" style="max-width: 20rem;">
                                      
                                      <div class="card-body">
                                        <h5 class="card-title">Penilaian</h5>
                                        <hr>
                                        <h3 class="card-text text-right">{{$penilaian}}</h3>
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
