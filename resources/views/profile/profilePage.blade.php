<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="{{ route('FindFriend') }}">
    <button>Find Friend</button>
</a>

@if (count($profile) > 0)
    <h2>{{ $profile[0]->user->User_name }}</h2>
    <div>
    <img src="{{ asset($profile[0]->user->imgpath) }}" alt="user Image" width="100">

    </div>
@endif
<table border="4">
    

        <thead>
            <th>id</th>
            <th>title</th>
            <th>discreption</th>
            <th>Privacy</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @foreach ($profile as $profile)
        @if ($profile->post)
        <tr>
            <td>{{ $profile->id }}</td>
            <td>{{ $profile->post->title }}</td>
            <td style="width: 500px; height: 200px;">{{ $profile->post->Discription }}</td>
            <td>{{ $profile->post->Privacy }}</td>
            <td>
            <form action="{{ Route('edit_post',$profile->post->id) }}">
            <input type="hidden" value="{{ $profile->post->id }}" name="id">
            <input type="submit" value="Edit">
        </form>
        </td>
        <td>
        <form action="{{ Route('delete_post',$profile->post->id) }}">
            <input type="hidden" value="{{ $profile->post->id }}" name="id">
            <input type="submit" value="Delete">
        </form>
        </td>
        @endif

        @endforeach
    </tbody>


    </table>

    <a href="{{ route('create_post') }}">
    <button>Create Post</button>
</a>

<form method="POST" action="{{ route('logout') }}">
     @csrf
     <button type="submit">logout</button>
    </form>
</body> 
</html>