@extends('layouts.app')

@section('content')
    <div>
        <a href="{{route('card_index')}}" class="btn btn-outline-info mt-1 float-left">Go back</a>

        <div class="display-4">
            <h1>{{ $card->title }}</h1>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-primary">{{ session('status') }}</div>
    @endif

    <hr>
    <h3>Add new note</h3>

    <form action="{{route('add_note', $card->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <textarea name="body" id="body" cols="20" rows="5" class="form-control {{ $errors->has('body') ? 'border-danger': '' }}"></textarea>
            @if($errors->has('body'))
                <div class="alert alert-danger">{{ $errors->first('body')}}</div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success form-control">Add Note</button>
        </div>
    </form>

    <hr>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Notes</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->body }} <br> <span class="text-info float-right">- {{ $note->user->name }}</span></td>
                    <td>
                        <a class="btn btn-outline-warning mr-1" href="{{route('edit_note', $note->id)}}">Edit</a>
                        <form action="{{route('delete_note', $note->id)}}" method="POST" class="d-inline-block">
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $notes->links() }}
@endsection
