<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="4">
        <thead>
            <th>id</th>
            <th>title</th>
            <th>Description</th>
            <th>Privacy</th>
            <th>user name</th>
            <th>Add to profile </th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
        
        <tr>
            <td>{{ $posts->id }}</td>
            <td>{{ $posts->title }}</td>
            <td>{{ $posts->Discription }}</td>
            <td>{{ $posts->Privacy }}</td>
            <td>{{ $posts->user->User_name }}</td>
          
            <form action="{{ Route('addtoprofile',$posts->id) }}" method="post">
                @csrf
                <td>
                <input type="submit" value="Add to profile">
                </td>
            </form>
            <td>
            <form action="{{ Route('edit_post',$posts->id) }}">
            <input type="hidden" value="{{ $posts->id }}" name="id">
            <input type="submit" value="Edit">
        </form>
        </td>
        <td>
        <form action="{{ Route('delete_post',$posts->id) }}">
            <input type="hidden" value="{{ $posts->id }}" name="id">
            <input type="submit" value="Delete">
        </form>
        </td>
        </tr>
    
    </tbody>
    </table>
</body>
</html>