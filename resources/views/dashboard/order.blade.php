@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
      <h3>Order Management</h3> 
    </div>
    <order-list :orders='{{ json_encode($orders) }}' :user='{{ json_encode(Auth::user()) }}'></order-list>
</div>
@endsection
