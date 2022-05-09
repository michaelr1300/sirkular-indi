@extends('layouts.dashboard')

@section('content')
  <dashboard-order :orders='{{ json_encode($orders) }}' :user='{{ json_encode(Auth::user()) }}'></dashboard-order>
@endsection
