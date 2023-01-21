@extends('mainView')

@section('content')
{{-- SHOW SIDEBAR IF ADMIN --}}
    @if(Auth::check() && Auth::user()->role == 'admin')
        @include('components.sidebar')
    @endif
    @php
      $head = ['ID Supplier', 'Nama', 'Alamat', 'Telp', 'Keterangan'];
      $ids = ['sup_id', 'sup_nama', 'sup_alamat', 'sup_telp', 'sup_keterangan'];
    @endphp
    <!-- Modal -->
    @include('components.modals.add',['head' => $head, 'index' => $ids])
    @include('components.modals.update',['head' => $head, 'index' => $ids])
      
    <h1 class="main-heading">Supplier</h1>

      @include('components.table', ['head'=> $head, 'db'=>$db, 'view'=> 'supplier'])


    <script>
      const addSubmit = document.querySelector('#btn-add')
      const btnDel = document.querySelector('#btn-del')
      const updateSubmit = document.querySelector('#btn-update')
      const currentURL = window.location.href
    </script>
    <script src="{{ asset('res/js/crud_master.js') }}"></script>
@endsection