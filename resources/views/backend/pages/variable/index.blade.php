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
                                          Menu <br> Variable
                                      </div>
                                      <div class="float-right">
                                          <a href="{{route('home')}}">Kembali</a>
                                      </div>
                                  </div><hr>
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="clearfix pb-3">
                                            <div class="float-left">
                                              <a class="btn btn-primary" href="{{route('variable.create')}}">Tambah Data</a>
                                            </div>
                                          </div>
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col"></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @forelse($variables as $key => $v)
                                              <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$v->name}}</td>
                                                <td class="text-right">

                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('variable.show', $v->id) }}" class="btn btn-primary">Lihat</a>
                                                    <a class="btn btn-primary" href="{{ route('variable.edit', $v->id) }}">Ubah</a>
                                                    <form id="delete-form-{{$v->id}}" 
                                                        method="post" 
                                                        action="{{route('variable.destroy', $v->id)}}"
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
