<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('update_post') }}" method="post">
    @csrf
        <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="insert title" value="{{ $posts ->title }}">
        </div>
        <div>
        <h2>Discription</h2>
        <input type="text" name="Discription" placeholder="insert title" value="{{ $posts ->Discription }}" style="width: 500px; height: 200px;">
        </div>
        <select name="Privacy">
    <option value="Public" >Public</option>
    <option value="Private">Private</option>
</select>

<input type="text" name="post_date" placeholder="insert title" value="{{ $posts ->post_date }}">
<input type="hidden" name="user_id" placeholder="insert title" value="{{ $posts ->user_id }}">
<input type="hidden" name='id' value="{{ $posts ->id }}">

        <input type="submit" value="post">
    </form>

    
</body>
</html>