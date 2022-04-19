@extends('layouts.dashboard')

@section('content')
<div class="container">
    DASHBOARD ORDER
    <order-list :orders='{{ json_encode($orders) }}' :user='{{ json_encode(Auth::user()) }}'></order-list>
</div>
@endsection
