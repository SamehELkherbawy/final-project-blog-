<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('store_user') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name='User_name' placeholder='Insert Name'>
    <input type="text" name='email' placeholder='Insert email'>
    <input type="password" name='password' placeholder='Insert password'>
    <input type="Address" name='Address' placeholder='Insert Address'>
    <input type="Phone" name='Phone' placeholder='Insert Phone Number'>
        <label for="imgpath">Profile Image</label>
        <input type="file" name="imgpath" id="imgpath" required>
        <input type="hidden" name="id">
    <input type="hidden" name="role">
    <input type="submit">
</form>

<a href="{{ route('index_user') }}">
    <button>Go to Index Page</button>
</a>

</body>
</html>