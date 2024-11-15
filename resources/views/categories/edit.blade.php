<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <form action="{{ url('/categories/'.$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $category->name ?? '' }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ url('/categories') }}">Back to List</a>
</body>
</html>