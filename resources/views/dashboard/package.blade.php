@extends('layouts.dashboard')

@section('content')
    <dashboard-package :packages='{{ json_encode($packages) }}'></dashboard-package>
@endsection
