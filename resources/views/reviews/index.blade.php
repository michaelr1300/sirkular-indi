@extends('layouts.app')

@section('content')
<div class="container">
    Review List 
    {{ $reviews }}
    @foreach ($reviews as $review)
        <div class="card-body">
            {{ $review->content }}
            @if ($review->photo_path)
                <img src="{{ asset('/storage/' . $review->photo_path) }}" alt="review-photo">
            @else
                <img src="{{ asset('/images/icon-indi-pair-color.svg') }}" alt="review-photo">
            @endif
        </div>
    @endforeach
</div>
@endsection
