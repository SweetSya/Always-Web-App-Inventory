@extends('mainView')

@section('content')
<div>
    <h1>TRANSAKSI PEMBELIAN</h1>
    {{-- SHOW SIDEBAR IF OPERATOR or ADMIN --}}
    @if(Auth::check() && Auth::user()->role == 'operator' || Auth::user()->role == 'admin')
        @include('components.sidebar')
    @endif
</div>
@endsection