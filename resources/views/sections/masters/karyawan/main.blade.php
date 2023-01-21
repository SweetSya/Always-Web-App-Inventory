@extends('mainView')

@section('content')
    @if(Auth::check() && Auth::user()->role == 'admin')
        @include('components.sidebar')
    @endif
    @php
      $head = ['ID Karyawan', 'Nama', 'Alamat', 'Jenis Kelamin'];
      $ids = ['kry_id', 'kry_nama', 'kry_alamat', 'kry_jeniskel'];
    @endphp
      <!-- Modal -->
      @include('components.modals.add',['head' => $head, 'index' => $ids])
      @include('components.modals.update',['head' => $head, 'index' => $ids])
      
    <h1 class="main-heading">Karyawan</h1>
      @include('components.table', ['head'=> $head, 'db'=>$db, 'view'=> 'karyawan'])


    <script>
      const addSubmit = document.querySelector('#btn-add')
      const btnDel = document.querySelector('#btn-del')
      const updateSubmit = document.querySelector('#btn-update')
      const currentURL = window.location.href
    </script>
    <script src="{{ asset('res/js/crud_master.js') }}"></script>
@endsection