<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="{{ route('create_user') }}">
    <button>Create</button>
</a>
    <table border="3">
    <thead>
        <th>Photo</th>
        <th>Name</th>
        <th>view profile </th>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
        <td>
            <img src="{{ asset($user->imgpath) }}" alt="user Image" width="100">
            </td>

        <td>{{$user->User_name}}</td>

        <td>
        <form action="{{ Route('viewprofile',$user->id) }}">
            <input type="hidden" value="{{ $user->id }}" name="id">
            <input type="submit" value="view profile">
        </form>
        </td>
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