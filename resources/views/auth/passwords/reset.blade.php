@extends('layouts.guest')

@section('content')
<div class="container d-flex flex-column"  style="min-height: 100vh">
    <div class="my-auto">
        <reset-password :token='{{ json_encode($token) }}' :email='{{ json_encode($email) }}'></reset-password>
    </div>
</div>
@endsection
