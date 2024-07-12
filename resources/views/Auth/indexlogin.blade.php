<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="{{ route('create_user') }}">
    <button>Create user</button>
</a>
<div>
<a href="{{ route('FindFriend') }}">
    <button>Find Friend</button>
</a>
</div>

    <table border="3">
    <thead>
        <th>id</th>
        <th>Name</th>
        <th>Eamil</th>
        <th>password</th>
        <th>Role</th>
        <th>Address</th>
        <th>Phone</th>
        <th>img</th>
        <th>Update</th>
        <th>Delete</th>
        <th>cart</th>
    </thead>
    <tbody>
    @if($users)
        <tr>
        <td>{{$users->id}}</td>
        <td>{{$users->User_name}}</td>
        <td>{{$users->email}}</td>
        <td>{{$users->password}}</td>
        <td>{{$users->role}}</td>
        <td>{{$users->Address}}</td>
        <td>{{$users->Phone}}</td>
        <td>
            <img src="{{ asset($users->imgpath) }}" alt="user Image" width="100">
            </td>
        <td>
        <form action="{{ Route('edit_user',$users->id) }}">
            <input type="hidden" value="{{ $users->id }}" name="id">
            <input type="submit" value="Edit">
        </form>
        </td>
        <td>
        <form action="{{ Route('delete_user',$users->id) }}">
            <input type="hidden" value="{{ $users->id }}" name="id">
            <input type="submit" value="Delete">
        </form>
        </td>
        <td>
        <form action="{{ Route('create_post',$users->id) }}">
            <input type="hidden" value="{{ $users->id }}" name="id">
            <input type="hidden" value="{{ $users->name }}" name="id">
            <button>create post</button>
        </form>
        </td>
        </tr>
        @endif
    </tbody>
    </table>

    <form method="POST" action="{{ route('logout') }}">
     @csrf
     <button type="submit">logout</button>
    </form>


</body>
</html>