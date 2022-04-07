@extends('layouts.app')

@section('content')
    <catalog :packages='{{ json_encode($packages) }}'></catalog>
@endsection
