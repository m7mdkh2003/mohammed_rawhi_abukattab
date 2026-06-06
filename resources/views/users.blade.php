@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800 text-center">
        Users Management System
    </h1>

    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
             width="100">
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <button type="button"
                            class="close"
                            data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow mb-4">

                @if (isset($user))

                <div class="card-header bg-info text-white">
                    <h5 class="m-0">
                        <i class="fas fa-edit"></i>
                        Update User
                    </h5>
                </div>

                <div class="card-body">

                    <form action="{{ url('user/update') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="id"
                               value="{{ $user->id }}">

                        <div class="mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $user->name) }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $user->email) }}">

                        </div>

                        <button type="submit"
                                class="btn btn-info">

                            <i class="fas fa-save"></i>
                            Update User

                        </button>

                    </form>

                </div>

                @else

                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">
                        <i class="fas fa-user-plus"></i>
                        Add New User
                    </h5>
                </div>

                <div class="card-body">

                    <form action="{{ url('user/create') }}" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter Name"
                                   value="{{ old('name') }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter Email"
                                   value="{{ old('email') }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter Password">

                        </div>

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-plus"></i>
                            Add User

                        </button>

                    </form>

                </div>

                @endif

            </div>

            <div class="card shadow mb-4">

                <div class="card-header bg-success text-white">

                    <h5 class="m-0">

                        <i class="fas fa-users"></i>
                        Current Users

                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="thead-dark">

                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="220">Actions</th>
                                </tr>

                            </thead>

                            <tbody>

                            @foreach ($users as $user)

                                <tr>

                                    <td>{{ $user->id }}</td>

                                    <td>{{ $user->name }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td>

                                        <form action="/user/delete/{{ $user->id }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">

                                                <i class="fas fa-trash"></i>
                                                Delete

                                            </button>

                                        </form>

                                        <form action="/user/edit/{{ $user->id }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-info btn-sm">

                                                <i class="fas fa-edit"></i>
                                                Edit

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection