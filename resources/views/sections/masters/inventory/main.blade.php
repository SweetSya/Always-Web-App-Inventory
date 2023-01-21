@extends('mainView')

@section('content')
    @if(Auth::check() && Auth::user()->role == 'admin')
        @include('components.sidebar')
    @endif
    @php
      $head = ['ID Barang', 'Nama Barang', 'Harga Jual', 'Harga Beli', 'Stok', 'ID Sup'];
      $ids = ['brg_id', 'brg_nama', 'brg_harga_jual', 'brg_harga_beli', 'brg_stok', 'brg_supplier_id'];
    @endphp 
      <!-- Modal -->
      @include('components.modals.add',['head' => $head, 'index' => $ids])
      @include('components.modals.update',['head' => $head, 'index' => $ids])
      
    <h1 class="main-heading">Inventory</h1>
      @include('components.table', ['head'=> $head, 'db'=>$db, 'view'=> 'inventory'])

    <script>
      const addSubmit = document.querySelector('#btn-add')
      const btnDel = document.querySelector('#btn-del')
      const updateSubmit = document.querySelector('#btn-update')
      const currentURL = window.location.href

    </script>
    <script src="{{ asset('res/js/crud_master.js') }}"></script>
@endsection