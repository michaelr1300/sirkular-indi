@extends('layouts.app')

@section('content')
<purchase-history :user='{{ json_encode(Auth::user()) }}' :orders='{{ json_encode($orders) }}'></purchase-history> 
@endsection
