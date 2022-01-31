<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accounts</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>All Accounts</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('accounts.create') }}"> Create Account</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                @foreach ($accounts as  $account)
                    <tr style="background-color: antiquewhite;">
                        <th>Account ID : {{ $account->id }}</th>
                        <th>Account Name : {{ $account->name }}</th>
                    </tr>

                    @if($account->projects->count() > 0)
                        <tr  style="background-color: #c4c4c4;">
                            <th  colspan=50%>Projects : <span>{{ $account->name }}</span></th>
                        </tr>
                        @foreach ($account->projects as $project)
                            <tr>
                                <td>ID : {{ $project->id }}</td>
                                <td>Name : {{ $project->name }}</td>
                                <td>price : {{ $project->price }}</td>
                            </tr>

                            <tr>
                                <td>
                                    @if($project->tasks->count() > 0)
                                    <table class="table table-bordered">
                                        <tr style="background-color: #73c7ff;">
                                            <th colspan=50%>Tasks </th>
                                        </tr>
                                        @foreach ($project->tasks as $task)
                                        <tr>
                                            <td>ID : {{ $task->id }}</td>
                                            <td>Name : {{ $task->name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @endif
                                </td>
                                <td>
                                @if($project->jobs->count() > 0)
                                    <table class="table table-bordered">
                                        <tr style="background-color: #535ea8;">
                                            <th colspan=50%>Jobs</th>
                                        </tr>
                                        @foreach ($project->jobs as $job)
                                            <tr>
                                                <td>ID : {{ $job->id }}</td>
                                                <td>Name : {{ $job->name }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                                </td>

                            </tr>
                        @endforeach
                    @endif

                @endforeach
            </table>
        </div>
    </body>
</html>
