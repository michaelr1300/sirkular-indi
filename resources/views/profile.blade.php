@extends('layouts.app')

@section('content')
<profile :user='{{ json_encode(Auth::user()) }}'></profile>  
{{-- <div class="container">
    <div class="row justify-content-center">
    </div>
</div> --}}
@endsection
