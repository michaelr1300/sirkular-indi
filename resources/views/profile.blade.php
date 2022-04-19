@extends('layouts.app')

@section('content')
<profile :user='{{ json_encode(Auth::user()) }}' :orders='{{ json_encode($orders) }}'></profile> 
@endsection
