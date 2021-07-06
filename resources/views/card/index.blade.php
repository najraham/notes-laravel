@extends('layouts.app')

@section('content')
    <div class="display-4">
        <h1>Cards</h1>
    </div>

    @if (session('status'))
        <div class="alert alert-primary">{{ session('status') }}</div>
    @endif

    <div class="float-right mb-3">
        <a class="btn btn-success" href="{{ route('add_card') }}">Add Card</a>
    </div>

    @if(empty($cards))
        <p>
            There are no cards
        </p>

    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Card List</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cards as $card)
                <tr>
                    <td>{{ $card->title }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('show_card', $card->id)}}">View</a>
                        <a class="btn btn-warning" href="{{route('edit_card', $card->id)}}">Edit</a>
                        <form action="{{route('delete_card', $card->id)}}" method="POST" class="d-inline-block">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $cards->links() }}
    @endif
@endsection
