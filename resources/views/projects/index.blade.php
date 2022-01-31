<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 8 CRUD Tutorial From Scratch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All projects</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create Project</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Account</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->price }}</td>
                <td>{{ $project->account->name }}</td>
                <td>
                    <form action="{{ route('projects.destroy',$project->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{!! $projects->links() !!}
</body>
</html>
