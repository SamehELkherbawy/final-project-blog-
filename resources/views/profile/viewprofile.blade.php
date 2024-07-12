<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="{{ route('profilePage') }}">
    <button>My Page</button>
</a>
@if (count($posts) > 0)
    <h2>{{ $posts[0]->user->User_name }}</h2>
    <div>
    <img src="{{ asset($posts[0]->user->imgpath) }}" alt="user Image" width="100">

    </div>
@endif
    <table border="4">
        <thead>
            <th>id</th>
            <th>title</th>
            <th>Description</th>
            <th>Privacy</th>
        </thead>

        @foreach ($posts as $posts)
        <tbody>
        
        <tr>
            <td>{{ $posts->id }}</td>
            <td>{{ $posts->title }}</td>
            <td style="width: 500px; height: 200px;">{{ $posts->Discription }}</td>
            <td>{{ $posts->Privacy }}</td>
        
        </tr>
        @endforeach
    </tbody>
    </table>
    <form method="POST" action="{{ route('logout') }}">
     @csrf
     <button type="submit">logout</button>
    </form>

</body>
</html>