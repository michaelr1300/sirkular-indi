@extends('layouts.dashboard')

@section('content')
    <dashboard-product :packages='{{ json_encode($packages) }}'></dashboard-product>
@endsection
