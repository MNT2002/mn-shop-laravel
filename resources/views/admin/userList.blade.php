@extends('admin.admin_layout')
@section('admin_content')
    <div class="all-category-product-wrapper">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách người sử dụng
            </div>
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userList as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>
                            <img class="user_image" src="{{ asset('/public/backend/images/userAvata/'. $user->image_path) }}" alt="">
                            {{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->quyen == 1)
                            {{ "admin" }}
                            @else
                            {{ "Thường" }}
                            @endif
                        </td>
                        <td>
                            <form action="users/{{ $user->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="users/{{ $user->id }}/edit">
                                <i class="fa-solid fa-pencil"></i>
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- @foreach ($userList as $user)
    <h2>{{ $user->id }}</h2>
    <h2>{{ $user->name }}</h2>
    <h2>{{ $user->email }}</h2>
    <h2>{{ $user->password }}</h2>
    <h2>{{ $user->quyen }}</h2>
@endforeach --}}
@endsection
