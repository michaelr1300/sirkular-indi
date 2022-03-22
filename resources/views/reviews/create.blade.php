@extends('layouts.app')

@section('content')
<div class="container">
    Create Review Form
    <form method="POST" action="{{ route('review.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
        
            <div class="col-md-6">    
                <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" rows="5"></textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
