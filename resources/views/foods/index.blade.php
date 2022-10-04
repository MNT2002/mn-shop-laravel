@extends('layouts.defaultHeaderFooter')

@section('content')
    <h1>this is foods page</h1>
    <a href="foods/create"
    class="btn btn-primary"
    role="button"    
    >
    Create a new food
    </a>

    @foreach ($foods as $food)

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="ms-2 me-auto">
            <div class="fw-bold">
                <a href="foods/{{ $food->id }}">
                    {{ $food->name }}
                </a>
            </div>
            {{ $food->description }}
        </div>

        <span class="badge bg-primary rounded-pill">{{ $food->count }}</span>
        <a href="foods/{{ $food->id }}/edit">Edit</a>
        <form action="foods/{{ $food->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger">
                Delete
            </button>
        </form>
    </li>
    @endforeach
@endsection