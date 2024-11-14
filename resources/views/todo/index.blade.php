@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todos</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create Todo</a>
    <ul>
        @foreach($todos as $todo)
            <li>
                {{ $todo->title }} 
                <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
