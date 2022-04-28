@extends('layouts.app')

@section('content')
    <review :reviews='{{ json_encode($reviews) }}'></review>
@endsection