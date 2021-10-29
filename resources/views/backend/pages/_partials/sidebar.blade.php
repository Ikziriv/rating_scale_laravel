<div class="col-3">
    <ul class="nav nav-pills flex-column">
    @if(Auth::user()->role_id === 1) 
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('role.index')}}">Jabatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">Pegawai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('variable.index')}}">Variable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('indikator.index')}}">Indikator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('penilaian.index')}}">Penilaian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('penilaian.daily')}}">Laporan</a>
      </li>
    @endif
    @if(Auth::user()->role_id === 2) 
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">Pegawai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('penilaian.index')}}">Penilaian</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('penilaian.daily')}}">Laporan</a>
      </li>
    @endif
    @if(Auth::user()->role_id === 3) 
      <li class="nav-item">
        <a class="nav-link" href="{{route('penilaian.daily')}}">Laporan</a>
      </li>
    @endif
    </ul>
</div>