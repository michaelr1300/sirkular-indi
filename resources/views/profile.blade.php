@extends('layouts.app')

@section('content')
<profile :user='{{ json_encode(Auth::user()) }}'></profile> 
@endsection
