@extends('layouts.app')

@section('content')
    <h1>
        Add Card
    </h1>

    <form action="{{route('store_card')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input name="title" id="title" class="form-control {{ $errors->has('title') ? 'border-danger': '' }}" value="{{ old('title') ?? old('title') }}">
            @if($errors->has('title'))
                <div class="alert alert-danger">{{ $errors->first('title')}}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success form-control">Add Card</button>
        </div>
    </form>
@endsection