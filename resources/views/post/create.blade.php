<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store_post') }}" method="post">
    @csrf
        <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="insert title">
        </div>
        <div>
        <h2>Discription</h2>
        <textarea name="Discription" placeholder="Insert Description" style="width: 500px; height: 200px;"></textarea>
        </div>
        <select name="Privacy">
    <option value="Public" >Public</option>
    <option value="Private">Private</option>
</select>
        <input type="submit" value="post">
    </form>

    
</body>
</html>