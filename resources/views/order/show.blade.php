@extends('layouts.app')

@section('content')
<div class="container">
    {{-- {{ $order }} --}}
    <order-detail :order='{{ json_encode($order) }}' :user='{{ json_encode($user) }}'></order-detail>
</div>
@endsection
