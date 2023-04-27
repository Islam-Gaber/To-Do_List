<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <x-app-layout>

        <!-- The Add Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content w-50">
                <span class="close">&times;</span>
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                class="form-control rounded @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required
                                autocomplete="description">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary bg-primary">
                                {{ __('Create Task') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2>Tasks</h2>
                                <a class="btn btn-primary" id="myBtn">Add Task</a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($tasks->count())
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Completed</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->description }}</td>
                                                <td>
                                                    @if ($task->completed)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('tasks.edit', $task) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('tasks.complete', $task) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-success bg-success">Complete</button>
                                                    </form>
                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger bg-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        {{ $tasks->links() }}
                                    </tbody>
                                </table>
                            @else
                                <p>No tasks found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
