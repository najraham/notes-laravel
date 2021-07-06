@extends('layouts.app')

@section('content')
    <h1>
        Edit Card
    </h1>

    <form action="/cards/{{ $card->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <input name="title" id="title" class="form-control {{ $errors->has('title') ? 'border-danger': '' }}" value="{{ $card->title }}">
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $errors->first('title')}}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success form-control">Update Card</button>
        </div>
    </form>
@endsection