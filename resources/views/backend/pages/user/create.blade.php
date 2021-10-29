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
                                          Menu <br> Tambah Pegawai
                                      </div>
                                      <div class="float-right">
                                          <a href="{{route('user.index')}}">Kembali</a>
                                      </div>
                                  </div><hr>
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body">
                                            <form method="POST" action="{{route('user.store')}}">
                                              @csrf
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Username</label>
                                                  <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Email</label>
                                                  <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                  <label for="inputEmail4">Password</label>
                                                  <input type="password" class="form-control form-control-sm  @error('password') is-invalid @enderror" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                  <label for="inputEmail4">Re Password</label>
                                                  <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <hr>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Nama</label>
                                                  <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Jenis Kelamin</label>
                                                  <select name="jenkel" class="form-control form-control-sm @error('jenkel') is-invalid @enderror">
                                                    <option selected disabled>Pilihan</option>
                                                    <option value="L">Laki - laki</option>
                                                    <option value="P">Perempuan</option>
                                                  </select>
                                                @error('jenkel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Role</label>
                                                  <select name="role_id" class="form-control form-control-sm @error('role_id') is-invalid @enderror">
                                                    <option selected disabled>Pilihan</option>
                                                    @foreach($roles as $r)
                                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                                    @endforeach
                                                  </select>
                                                @error('role_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Alamat</label>
                                                  <textarea type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat"></textarea>
                                                </div>
                                                @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                              <div class="form-group">
                                                <label for="inputAddress">Tempat</label>
                                                <input type="text" class="form-control form-control-sm @error('tempat') is-invalid @enderror" name="tempat">
                                                @error('tempat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                              <div class="form-group">
                                                <label for="inputAddress2">Tanggal</label>
                                                <input type="date" class="form-control form-control-sm @error('tanggal') is-invalid @enderror" name="tanggal">
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="inputEmail4">Jenis Kartu</label>
                                                  <select name="jnskartu" class="form-control form-control-sm @error('tanggal') is-invalid @enderror">
                                                    <option selected disabled>Pilihan</option>
                                                    <option value="KTP">KTP</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="Passport">Passport</option>
                                                  </select>
                                                @error('jnskartu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="inputPassword4">Nomer Identitias</label>
                                                  <input type="text" class="form-control form-control-sm @error('noiden') is-invalid @enderror" name="noiden">
                                                @error('noiden')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-4">
                                                  <label for="inputEmail4">Agama</label>
                                                  <select name="agama" class="form-control form-control-sm @error('agama') is-invalid @enderror">
                                                    <option selected disabled>Pilihan</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="buddha">Buddha</option>
                                                  </select>
                                                @error('agama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                  <label for="inputPassword4">Telepon</label>
                                                  <input type="text" class="form-control form-control-sm @error('tlp') is-invalid @enderror" name="tlp">
                                                @error('tlp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                  <label for="inputPassword4">Status</label>
                                                  <select name="status" class="form-control form-control-sm @error('status') is-invalid @enderror">
                                                    <option selected disabled>Pilihan</option>
                                                    <option value="yes">Aktif</option>
                                                    <option value="no">Tidak Aktif</option>
                                                  </select>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                              </div>
                                              <hr class="pt-3">
                                              <button type="submit" class="btn btn-sm btn-block btn-primary">Simpan</button>
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
