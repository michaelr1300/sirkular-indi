@extends('layouts.dashboard')

@section('content')
    <dashboard-review :reviews='{{ json_encode($reviews) }}'></dashboard-review>
@endsection
