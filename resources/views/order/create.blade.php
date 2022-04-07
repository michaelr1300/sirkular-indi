@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <order-form :user='{{ json_encode($user) }}' :package-list='{{ json_encode($order_options) }}'></order-form>
<!-- </div> -->
@endsection
