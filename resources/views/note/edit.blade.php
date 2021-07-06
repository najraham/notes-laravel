@extends('layouts.app')

@section('content')
    <h1>
        Edit Note
    </h1>

    <form action="/notes/{{ $note->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <textarea name="body" id="body" cols="20" rows="5" class="form-control {{ $errors->has('body') ? 'border-danger': '' }}">{{ $note->body }}</textarea>
            @if($errors->has('body'))
                <div class="alert alert-danger">{{ $errors->first('body')}}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success form-control">Update Note</button>
        </div>
    </form>
@endsection