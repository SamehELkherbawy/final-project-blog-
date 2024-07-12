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
    @foreach ($users as $user)
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->User_name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->Address}}</td>
        <td>{{$user->Phone}}</td>
        <td>
            <img src="{{ asset($user->imgpath) }}" alt="user Image" width="100">
            </td>
        <td>
        <form action="{{ Route('edit_user',$user->id) }}">
            <input type="hidden" value="{{ $user->id }}" name="id">
            <input type="submit" value="Edit">
        </form>
        </td>
        <td>
        <form action="{{ Route('delete_user',$user->id) }}">
            <input type="hidden" value="{{ $user->id }}" name="id">
            <input type="submit" value="Delete">
        </form>
        </td>
        <td>
        <form action="{{ Route('adminProfilePage',$user->id) }}">
            <input type="hidden" value="{{ $user->id }}" name="id">
            <input type="hidden" value="{{ $user->name }}" name="id">
            <button>profile page</button>
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