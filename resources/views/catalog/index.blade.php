@extends('layouts.app')

@section('content')
    <catalog 
        :packages='{{ json_encode($packages) }}'
        :products='{{ json_encode($products) }}'
    ></catalog>
@endsection
