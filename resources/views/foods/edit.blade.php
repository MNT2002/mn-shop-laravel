@extends('layouts.defaultHeaderFooter')

@section('content')
    <h1>Update a food information</h1>
    <form action="../../foods/{{ $food->id }}" method="post">
        @csrf
        @method('PUT')
        <input 
            class="form-control"
            name="name"
            type="text"
            value="{{ $food->name }}"
            placeholder="Enter food's name">
        <input 
            class="form-control"
            name="description"
            type="text"
            value="{{ $food->description }}"
            placeholder="Enter food's description">
        <input 
            class="form-control"
            name="count"
            type="text"
            value="{{ $food->count }}"
            placeholder="Enter food's count">
        <button type="submit" class="btn btn-primary">Update Food</button>
    </form>
@endsection