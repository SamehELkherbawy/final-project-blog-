<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="3">
    <thead>
        <th>Name</th>
        <th>Eamil</th>
        <th>password</th>
        <th>Role</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Change</th>
    </thead>
    <tbody>
<form action="{{ route('update_user') }}" method="post">
    @csrf
    <td>
        <input type="text" name='User_name' placeholder='isert Name' value="{{ $users ->User_name }}">
        </td>
        <td>
    <input type="text" name='email' placeholder='Price' value="{{ $users ->email }}">
    </td>
        <td>
    <input type="text" name='password' placeholder='Description' value="{{ $users ->password }}">
    </td>
    <td>
    <select name="role">
    <option value="user" {{ $users->role === 'user' ? 'selected' : '' }}>User</option>
    <option value="admin" {{ $users->role === 'admin' ? 'selected' : '' }}>Admin</option>
</select>
</td>
<td>
    <input type="text" name='Address' placeholder='Address' value="{{ $users ->Address }}">
    </td>
    <td>
    <input type="text" name='Phone' placeholder='Phone' value="{{ $users ->Phone }}">
    </td>
    <input type="hidden" name='id' value="{{ $users ->id }}">
    <td>
    <input type="submit">
    </td>
</form>
</tbody>
</table>
</body>
</html>