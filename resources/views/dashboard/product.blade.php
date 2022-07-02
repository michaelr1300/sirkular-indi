@extends('layouts.dashboard')

@section('content')
    <dashboard-product :products='{{ json_encode($products) }}'></dashboard-product>
@endsection
