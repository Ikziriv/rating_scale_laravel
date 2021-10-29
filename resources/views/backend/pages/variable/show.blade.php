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
                                            Menu <br> Lihat Variable
                                        </div>
                                        <div class="float-right">
                                            <a href="{{route('variable.index')}}">Kembali</a>
                                        </div>
                                    </div>
                                    </p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                              <div class="card-body">
                                                <p class="card-text"><b><h5>{{$variable->name}}</h5></b></p>
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
