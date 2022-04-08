@extends('layouts.app')

@section('content')
<div class="container">
    DASHBOARD ORDER
    <order-list :orders='{{ json_encode($orders) }}'></order-list>
</div>
@endsection
