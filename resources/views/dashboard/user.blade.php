@extends('layouts.dashboard')

@section('content')
    <dashboard-user :users='{{ json_encode($users) }}'></dashboard-user>
@endsection
