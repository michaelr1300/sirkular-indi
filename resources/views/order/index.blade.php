@extends('layouts.app')

@section('content')
<div class="container">
    <order-list :orders='{{ json_encode($orders) }}'></order-list>
</div>
@endsection
