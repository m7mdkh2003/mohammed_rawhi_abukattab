@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Task List App</h1>

    <div class="offset-md-2 col-md-8">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        <div class="card">

            @if (isset($task))

                <div class="card-header">
                    Update Task
                </div>

                <div class="card-body">

                    <form action="{{ url('update') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="id"
                               value="{{ $task->id }}">

                        <div class="mb-3">
                            <label for="task-name" class="form-label">
                                Task
                            </label>

                            <input type="text"
                                   name="name"
                                   id="task-name"
                                   class="form-control"
                                   value="{{ old('name', $task->name) }}">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>
                                Update Task
                            </button>
                        </div>

                    </form>

                </div>

            @else

                <div class="card-header">
                    New Task
                </div>

                <div class="card-body">

                    <form action="{{ url('create') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="task-name" class="form-label">
                                Task
                            </label>

                            <input type="text"
                                   name="name"
                                   id="task-name"
                                   class="form-control"
                                   value="{{ old('name') }}">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>
                                Add Task
                            </button>
                        </div>

                    </form>

                </div>

            @endif

        </div>

        <div class="card mt-4">

            <div class="card-header">
                Current Tasks
            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($tasks as $task)

                            <tr>
                                <td>{{ $task->name }}</td>

                                <td>
                                    <form action="/delete/{{ $task->id }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        <button type="submit"
                                                class="btn btn-danger">

                                            <i class="fa fa-trash me-2"></i>
                                            Delete

                                        </button>

                                    </form>

                                    <a href="{{ url('/edit/' . $task->id) }}" class="btn btn-info">
                                        <i class="fa fa-info me-2"></i>
                                        Edit
                                    </a>
                                </td>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection