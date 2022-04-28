@extends('layouts.app')

@section('content')
    <home :reviews='{{ json_encode($reviews) }}'></home>
@endsection