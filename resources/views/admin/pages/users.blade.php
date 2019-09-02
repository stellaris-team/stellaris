@php use App\User; @endphp
@extends ('admin.base')
@section ('admin.title', 'Users')

@section ('admin.content')
    <h1 class="title is-4">Users</h1>
    <h2 class="subtitle is-6">Below is a list of users that are able to access the administration area</h2>

    <div class="notification is-primary">
        <article class="media">
            <figure class="media-left">
                <p><i class="fad fa-exclamation-triangle fa-4x"></i></p>
            </figure>
            <div class="media-content">
                <p><strong>Note</strong></p>
                <p>
                    If you need to add or remove users, please use the artisan commands <code>user:create</code> and <code>user:remove</code>. User accounts cannot be added or removed within the administration area for security purposes.
                    <br>
                    You can learn more about the available commands and their usage in our <a href="#" target="_blank">documentation</a>.
                </p>
            </div>
        </article>
    </div>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email address</th>
            </tr>
        </thead>
        <tbody>
            @foreach (User::all(['id', 'username', 'name', 'email']) as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection