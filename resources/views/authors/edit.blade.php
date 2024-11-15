<!DOCTYPE html>
<html>
<head>
    <title>Edit Author</title>
</head>
<body>
    <header>
    <nav class="p-4">
        <a href="/categories" class="text-white">Category</a>
        <a href="/authors" class="text-white">Author</a>
        <a href="/books">Book</a>
    </nav>
</header>
    <h1>Edit Author</h1>
    <form action="{{ url('/authors/'.$author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $author->name ?? '' }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $author->email ?? '' }}" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="name" name="password" value="{{ $author->password ?? '' }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ url('/authors') }}">Back to List</a>
</body>
</html>