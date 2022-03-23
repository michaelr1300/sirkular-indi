@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Create Order Form</h3>
    <order-form :package-list='{{ json_encode($order_options) }}'></order-form>
</div>
@endsection
