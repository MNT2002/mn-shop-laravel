@extends('layouts.defaultHeaderFooter')

@section('content')
    <h1>Enter food information</h1>
    <form action="/mn-shop-laravel/foods" method="post"
    enctype="multipart/form-data">
        @csrf
        <input class="form-control"
            type="file" name="image"
        >
        <input 
            class="form-control"
            name="name"
            type="text"
            placeholder="Enter food's name">
        <input 
            class="form-control"
            name="description"
            type="text"
            placeholder="Enter food's description">
        <input 
            class="form-control"
            name="count"
            type="text"
            placeholder="Enter food's count">
        <div>
            <label>Choose a categories:</label>
            <select name="category_id" id="">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        @if ($errors->any()) {
            @foreach ($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        }
        @endif
    </form>
@endsection